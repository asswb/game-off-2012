<?php

if(isset($user->session)){
  $issues = new issues($db,$user,$cron,$alert);
}

class issues {
  public $db;
  public function __construct($_db,$_user,&$_cron,&$_alert){
    $this->db = $_db;
    $this->user = $_user;
    $this->uid = $_user->data['uid'];
    $this->cron = $_cron;
    $this->alert = $_alert;

    // Check current issue
    if($this->user->data['issue'] and $this->user->data['issue_eta'] < time()){
      $current_issue = $this->get_current_issue();

      $bugs = $this->get_user_bugs_count();

      $new_cbq = $this->user->data['cbq']+($current_issue['delta_cbq']/100);
      if($new_cbq > 1 + SYS_BUG_CBQ_CHANGE/100*$bugs ){
        $new_cbq = 1 + SYS_BUG_CBQ_CHANGE/100*$bugs;
      } elseif($new_cbq < 0){
        $new_cbq = 0;
      }

      $new_com = ceil($this->user->data['com']*(1+$current_issue['delta_com']/100));
      if($new_com < 1){
        $new_com = 1;
      }

      $q = $this->db->query('UPDATE users SET cbq='.$this->db->quote($new_cbq).',com='.$this->db->quote($new_com).' WHERE uid='.$this->db->quote($this->uid));

      $this->alert->add("Issue Complete","<p>The issue has completed.</p>".
         "<p>&Delta; Community: ".$this->user->data['com']." &rarr; ".$new_com." people [".($current_issue['delta_com']>=0?"+":"").$current_issue['delta_com']."%]</p>".
         "<p>&Delta; Code Base Quality: ".($this->user->data['cbq']*100)." &rarr; ".($new_cbq*100)."% [".($current_issue['delta_cbq']>=0?"+":"").$current_issue['delta_cbq']."%]</p>",
       "success");

      $this->user->data['cbq'] = $new_cbq;
      $this->user->data['com'] = $new_com;

      // Clear current issue
      $this->set_current_issue();

      // Delete issue
      if($current_issue['chance'] < 100){
        $this->db->query("DELETE FROM user_issue_table WHERE iid=".$this->db->quote($current_issue['iid'])." and uid=".$this->db->quote($this->user->data['uid']));
      }
    }

    // Check for new issues
    if($this->user->data['lastupdate']==0){
      $lastupdate = time();
      $this->db->query("UPDATE users SET lastupdate=".$this->db->quote($lastupdate)." WHERE uid=".$this->db->quote($this->user->data['uid']) );
    } else {
      $lastupdate = $this->user->data['lastupdate'];
    }
    $info = $this->cron->run($lastupdate,SYS_ISSUE_INTERVAL);
    if($info->run > 0){
      $q = $this->db->query("SELECT iid,chance FROM issue_table");
      $new_issues = 0;
      $cache = $q->fetchAll(PDO::FETCH_ASSOC);
      for($i=0;$i<$info->run;$i++){
        foreach($cache as $test){
          if(rand(0,100)<=$test['chance']){
            $q = $this->db->query("SELECT uiid FROM user_issue_table WHERE uid=".$this->db->quote($this->uid)." and iid=".$this->db->quote($test['iid']));
            $r = $q->fetchAll(PDO::FETCH_ASSOC);
            if(count($r)==0){
              $this->db->query("INSERT INTO user_issue_table (uid,iid) VALUES (".$this->db->quote($this->uid).",".$this->db->quote($test['iid']).");");
              $q = $this->db->query("SELECT type FROM issue_table WHERE iid=".$this->db->quote($test['iid']));
              $r = $q->fetchAll(PDO::FETCH_ASSOC);
              $new_issues++;
            }
          }
        }
      }
      $cache = null;
      if($new_issues > 0){
        $bugs = $this->get_user_bugs_count();
        if($bugs > 0){
          $new_cbq = $this->user->data['cbq']+(SYS_BUG_CBQ_CHANGE*$bugs/100);
          if($new_cbq > 1 + SYS_BUG_CBQ_CHANGE/100*$bugs){
            $new_cbq = 1 + SYS_BUG_CBQ_CHANGE/100*$bugs;
          } elseif($new_cbq < 0){
            $new_cbq = 0;
          }
          $cbq_change = "<p>&Delta; Code Base Quality: ".($this->user->data['cbq']*100)." &rarr; ".($new_cbq*100)."% [".(SYS_BUG_CBQ_CHANGE*$bugs)."%]</p>";
          $q = $this->db->query('UPDATE users SET cbq='.$this->db->quote($new_cbq).' WHERE uid='.$this->db->quote($this->uid));
        } else {
          $cbq_change = "";
        }
        $this->alert->add("New Issues","<p>$new_issues new issue".($new_issues>1?"s":"")." have been reported.</p>".$cbq_change,"info");
        if($bugs > 0){
          $this->user->data['cbq'] = $new_cbq;
        }
      }
      $this->db->query("UPDATE users SET lastupdate=".$this->db->quote($info->lastrun)." WHERE uid=".$this->db->quote($this->uid) );
    }
  }
  private function get_user_bugs_count(){
    $q = $this->db->query("SELECT count(issue_table.iid) as count FROM issue_table,user_issue_table WHERE issue_table.iid=user_issue_table.iid and type='bug' and user_issue_table.uid=".$this->db->quote($this->uid));
    $r = $q->fetchAll(PDO::FETCH_ASSOC);
    return $r[0]['count'];
  }
  public function set_current_issue($iid=''){
    if($iid == ''){
      $this->db->query('UPDATE users SET issue=\'0\',issue_eta=\'0\' WHERE uid='.$this->db->quote($this->uid));
      $this->user->data['issue'] = 0;
      $this->user->data['issue_eta'] = 0;
    } else {
      $issue = $this->get_issue($iid);
      $eta = floor($this->calculate_eta($issue)+time());
      $this->db->query('UPDATE users SET issue='.$this->db->quote($iid).',issue_eta='.$this->db->quote($eta).' WHERE uid='.$this->db->quote($this->uid));
      $this->user->data['issue'] = $iid;
      $this->user->data['issue_eta'] = $eta;
    }
  }

  public function get_current_issue(){
    return $this->get_issue($this->user->data['issue']);
  }

  public function get_user_issue($uiid){
    $q = $this->db->query('SELECT * FROM user_issue_table WHERE uiid='.$this->db->quote($uiid));
    $issues = $q->fetchAll(PDO::FETCH_ASSOC);
    if(count($issues)>0){
      return $issues[0];
    }
  }

  public function get_user_issues(){
    $q = $this->db->query('SELECT *
      FROM user_issue_table,issue_table
      WHERE uid='.$this->db->quote($this->uid).'
        AND user_issue_table.iid=issue_table.iid
      ORDER BY issue_table.type ASC,issue_table.time ASC' );
    return $q->fetchAll(PDO::FETCH_ASSOC);
  }

  public function get_issue($iid){
    $q2 = $this->db->query('SELECT * FROM issue_table WHERE iid='.$this->db->quote($iid));
    return $q2->fetch(PDO::FETCH_ASSOC);
  }

  public function calculate_eta($issue){
    $cbq = $this->user->data['cbq'];
    $time = $issue['time'];
    return $time/($cbq+1)*SYS_ISSUE_FACTOR;
  }
  public function count(){
    $q = $this->db->query("SELECT count(uiid) as count FROM user_issue_table WHERE uid=".$this->db->quote($this->uid));
    $r = $q->fetchAll(PDO::FETCH_ASSOC);
    return $r[0]['count'];
  }
  private function type_classes($type){
    $t = "label";
    if($type=="bug"){
      $classes = "$t $t-important";
    } elseif($type=="enhancement"){
      $classes = "$t $t-success";
    } elseif($type=="pull_request"){
      $classes = "$t $t-info";
    } else {
      $classes = "$t";
    }
    return $classes;
  }

  public function stostr($secs) {
    $r = '';
    if($secs>=86400){
      $days=floor($secs/86400);$secs=$secs%86400;
      $r=$days.' day';
      if($days<>1){
        $r.='s';
      }
      $r.=' ';
    }
    if($secs>=3600){
      $hours=floor($secs/3600);$secs=$secs%3600;
      $r.=$hours.' hour';
      if($hours<>1){
        $r.='s';
      }
      $r.=' ';
    }
    if($secs>=60){
      $minutes=floor($secs/60);$secs=$secs%60;
      $r.=$minutes.' min';
      if($minutes<>1){
        $r.='s';
      }
      $r.=' ';
    }
    $r.=$secs.' sec';
    if($secs<>1){
      $r.='s';
    }
    return $r;
  }

  public function render_teaser($issue){
    $type = '<span class="'.$this->type_classes($issue['type']).'">'.$issue['type'].'</span>';
    $time = $this->stostr(floor($this->calculate_eta($issue)));
    return <<<EOT
<tbody>
  <tr>
    <td>{$issue['name']}</td>
    <td>{$issue['description']}</td>
    <td>{$type}</td>
    <td>{$time}</td>
    <td>
      <form action="" method="POST" class="btn-group">
        <input type="hidden" name="uiid" value="{$issue['uiid']}" />
        <button class="btn" type="submit" title="Start" name="exe" value="issue-start"><i class="icon-play"></i></button>
        <button class="btn" type="submit" title="Wontfix" name="exe" value="issue-wontfix"><i class="icon-ban-circle"></i></button>
      </form>
    </td>
  </tr>
</tbody>
EOT;
  }

}
