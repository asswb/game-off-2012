<?php

if(isset($user->session)){
  $issues = new issues($db,$user,$cron);
}

class issues {
  public $db;
  public function __construct($_db,$_user,&$_cron){
    $this->db = $_db;
    $this->user = $_user;
    $this->uid = $_user->data['uid'];
    $this->cron = $_cron;
  }

  public function set_user_issue($iid=''){
    if($iid == ''){
      $this->db->query("UPDATE users SET issue='0',issue_eta='0' WHERE uid=".$this->db->quote($this->uid));
    } else {
      $eta = $this->calculate_eta($iid);
      $this->db->query('UPDATE users SET issue='.$this->db->quote($iid).',issue_eta='.$this->db->quote($eta).' WHERE uid='.$this->db->quote($this->uid));
    }
  }
  public function get_user_issue(){
    return $this->get_issue($this->user->data['issue']);
  }

  public function get_user_issues(){
    $q = $this->db->query('SELECT *
      FROM user_issue_table,issue_table
      WHERE uid='.$this->db->quote($this->uid).'
        AND user_issue_table.iid=issue_table.iid' );
    return $q->fetchAll(PDO::FETCH_ASSOC);
  }

  public function get_issue($iid){
    $q2 = $this->db->query('SELECT * FROM issue_table WHERE iid='.$this->db->quote($iid));
    return $q2->fetch(PDO::FETCH_ASSOC);
  }

  private function calculate_eta($iid){
    $cbq = $this->user->data['cbq'];
    $q = $this->db->query('SELECT time FROM issue_table WHERE iid='.$this->db->quote($iid));
    $row = $q->fetch(PDO::FETCH_ASSOC);
    $time = $row['time'];
    return $time/$cbq;
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
    $time = $this->stostr($issue['time']);
    return <<<EOT
<tbody>
  <tr>
    <td>{$issue['name']}</td>
    <td>{$issue['description']}</td>
    <td>{$type}</td>
    <td>{$time}</td>
    <td>
      <form action="" method="POST" class="btn-group">
        <input type="hidden" name="uuid" value="{$issue['uiid']}" />
        <button class="btn" type="submit" title="Start" name="exe" value="issue-start"><i class="icon-play"></i></button>
        <button class="btn" type="submit" title="Wontfix" name="exe" value="issue-wontfix"><i class="icon-ban-circle"></i></button>
      </form>
    </td>
  </tr>
</tbody>
EOT;
  }

}
