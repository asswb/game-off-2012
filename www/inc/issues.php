<?php

class issues {
  public $db;
  public function __construct($_db,$_user,&$_cron){
    $this->db = $_db;
    $this->user = $_user;
    $this->uid = $_user->data['uid'];
    $this->cron = $_cron;
  }

  public function set_user_issue($iid=''){
    $eta = calculate_eta($iid);
    $this->db->query('UPDATE users SET issue='.$this->db->quote($iid).',issue_eta='.$this->db->quote($eta).' WHERE uid='.$this->db->quote($this->uid));
  }
  public function get_user_issue(){
    
  }

  public function get_user_issues(){
    $q = $this->db->query('SELECT
      user_issue_table.uiid,
      user_issue_table.iid,
      issue_table.name,
      issue_table.description,
      issue_table.type,
      issue_table.time,
      issue_table.delta_com,
      issue_table.delta_cbq,
      issue_table.chance
      FROM user_issue_table,issue_table
      WHERE uid='.$this->db->quote($this->uid).'
        AND user_issue_table.iid=issue_table.iid' );
    return $q->fetchAll(PDO::FETCH_ASSOC);
  }

  public function get_issue($iid){
    $q2 = $this->db->query('SELECT iid,name,description,type,eta FROM issue_table WHERE iid='.$this->db->quote($iid));
    return $q2->fetch(PDO::FETCH_ASSOC);
  }

  private function calculate_eta($iid){

    $q = $this->db->query('SELECT cbq FROM users WHERE userid='.$this->db->quote($this->uid));
    $row = $q->fetch(PDO::FETCH_ASSOC);

    $q2 = $this->db->query('SELECT time FROM issue_table WHERE iid='.$this->db->quote($iid));
    $row2 = $q2->fetch(PDO::FETCH_ASSOC);

    return $row2['time']/$row['cbq'];
  }
}
