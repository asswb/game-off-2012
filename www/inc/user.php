<?php

$user = new user($db);

class user {
  var $data = null;
  function __construct($db,$session=''){
    $this->db = $db;
    $this->session = $session;
    if(isset($_COOKIE['session'])){
      $this->session = $_COOKIE['session'];
    }
    if($this->session){
      $this->load_user();
    }
  }
  function login($username,$password){
    $hash = sha1($password.SYS_SALT);
    $q  = $this->db->query("SELECT * FROM users WHERE username = ".$this->db->quote($username)." AND password = ".$this->db->quote($hash) );
    $r = $q->fetchAll(PDO::FETCH_ASSOC);
    global $alert;
    if(count($r)>0){
      // extract the user data
      $this->data = $r[0];
      $this->session = sha1(uniqid('',TRUE).SYS_SALT);
      $this->data['session'] = $this->session;// use this session instead of old one.
      $q = $this->db->query("UPDATE users SET session=".$this->db->quote($this->session)." WHERE uid = ".$this->db->quote($this->data['uid']) );
      echo "<pre>".print_r($this->data,1)."</pre>";
      $alert->add("Login Successful","You have been logged in.","success");
    } else {
      $this->logout();
      $alert->add("Login Failed","Either your username or password are incorrect.","info");
    }
  }
  function register($username,$password1,$password2){
  
  }
  function logout(){
    $this->data = null;
    $this->session = null;
  }
  private function load_user(){
  
  }
}