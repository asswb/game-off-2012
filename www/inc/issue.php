<?php

class issues
{
  var $db;

  function __construct($_db,$_user){
    $this->db = $_db;
    $this->user = $_user;
  }

  public function get_issues(){
    $db = $this->db;
    $user = $this->user;
  }

  public function get_current_issues(){
    $db = $this->db;
    $user = $this->user;
    $return_array = array();
    $q = $db->query('SELECT issue,issue_eta FROM users WHERE userid="'.$user.'"');
    while($row = $q->fetch(PDO::FETCH_ASSOC)){
      $q2 = $db->query('SELECT name,description,type FROM issue_table WHERE iid="'.$row["issue"].'"');
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
    $db = $this->db;
    $return_array = array();
    $q2 = $db->query('SELECT name,description,type FROM issue_table WHERE iid="'.$iid.'"');
    $row2 = $q2->fetch(PDO::FETCH_ASSOC);
    $return_array['iid'] = $row["issue"];
    $return_array['name'] = $row2["name"];
    $return_array['description'] = $row2["description"];
    $return_array['type'] = $row2["type"];
    $return_array['eta'] = $row["issue_eta"];

    return $return_array;
  }

  public function set_current_issue($iid){
    $db = $this->db;
    $user = $this->user;
    $eta = calculate_eta($iid);

    $db->query('UPDATE users SET issue="'.$iid.'",issue_eta="'.$eta.'" WHERE userid="'.$user.'"');
  }

  private function calculate_eta($iid){
    $db = $this->db;
    $user = $this->user;

    $q = $db->query('SELECT cbq FROM users WHERE userid="'.$user.'"');
    $row = $q->fetch(PDO::FETCH_ASSOC);

    $q2 = $db->query('SELECT time FROM issue_table WHERE iid="'.$iid.'"');
    $row2 = $q2->fetch(PDO::FETCH_ASSOC);

    return ($row['cbq'] * $row2['time']);
  }
}
