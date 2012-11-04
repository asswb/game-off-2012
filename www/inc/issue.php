<?php

class issues
{
  var $db;
  function __construct($_db,$_uid){
    $this->db = $_db;
    $this->uid = $_uid;
  }

  public function get_issues(){
  }

  public function get_current_issues(){
    $return_array = array();
    $q = $this->db->query('SELECT issue,issue_eta FROM users WHERE userid="'.$this->uid.'"');
    while($row = $q->fetch(PDO::FETCH_ASSOC)){
      $q2 = $this->db->query('SELECT name,description,type FROM issue_table WHERE iid="'.$row["issue"].'"');
      $row2 = $q2->fetch(PDO::FETCH_ASSOC);
      $return_array['iid'] = $row["issue"];
      $return_array['name'] = $row2["name"];
      $return_array['description'] = $row2["description"];
      $return_array['type'] = $row2["type"];
      $return_array['eta'] = $row["issue_eta"];
    }
    return $return_array;
  }

  public function get_issue_detail($iid){
    $return_array = array();
    $q2 = $this->db->query('SELECT name,description,type FROM issue_table WHERE iid="'.$iid.'"');
    $row2 = $q2->fetch(PDO::FETCH_ASSOC);
    $return_array['iid'] = $row["issue"];
    $return_array['name'] = $row2["name"];
    $return_array['description'] = $row2["description"];
    $return_array['type'] = $row2["type"];
    $return_array['eta'] = $row["issue_eta"];

    return $return_array;
  }

  public function set_current_issue($iid){
    $eta = calculate_eta($iid);
    $this->db->query('UPDATE users SET issue="'.$iid.'",issue_eta="'.$eta.'" WHERE uid="'.$this->uid.'"');
  }

  private function calculate_eta($iid){

    $q = $this->db->query('SELECT cbq FROM users WHERE userid="'.$this->uid.'"');
    $row = $q->fetch(PDO::FETCH_ASSOC);

    $q2 = $this->db->query('SELECT time FROM issue_table WHERE iid="'.$iid.'"');
    $row2 = $q2->fetch(PDO::FETCH_ASSOC);

    return ($row['cbq'] * $row2['time']);
  }
}
