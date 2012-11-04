<?php

class issues
{
  public $db;
  public function __construct($_db,$_uid){
    $this->db = $_db;
    $this->uid = $_uid;
  }

  public function get_issues(){
  }

  public function get_current_issues(){
    $return_array = array();
    $q = $this->db->query('SELECT issue,issue_eta FROM users WHERE userid='.$this->db->quote($this->uid));
    while($row = $q->fetch(PDO::FETCH_ASSOC)){
      $q2 = $this->db->query('SELECT iid,name,description,type FROM issue_table WHERE iid='.$this->db->quote($row["issue"]));
      $return_array[] = $q2->fetch(PDO::FETCH_ASSOC);
    }
    return $return_array;
  }

  public function get_issue_detail($iid){
    $q2 = $this->db->query('SELECT iid,name,description,type,eta FROM issue_table WHERE iid='.$this->db->quote($iid));
    return $q2->fetch(PDO::FETCH_ASSOC);
  }

  public function set_current_issue($iid){
    $eta = calculate_eta($iid);
    $this->db->query('UPDATE users SET issue='.$this->db->quote($iid).',issue_eta='.$this->db->quote($eta).' WHERE uid='.$this->db->quote($this->uid));
  }

  private function calculate_eta($iid){

    $q = $this->db->query('SELECT cbq FROM users WHERE userid='.$this->db->quote($this->uid));
    $row = $q->fetch(PDO::FETCH_ASSOC);

    $q2 = $this->db->query('SELECT time FROM issue_table WHERE iid='.$this->db->quote($iid));
    $row2 = $q2->fetch(PDO::FETCH_ASSOC);

    return ($row['cbq'] * $row2['time']);
  }
}
