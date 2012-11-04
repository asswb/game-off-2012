<?php

$user = new user($db,$alert);

class user {
  var $data = null;
  var $alert = null;
  function __construct($db,&$alert){
    $this->db = $db;
    $this->alert = $alert;
    if(isset($_COOKIE['session'])){
      $this->session = $_COOKIE['session'];
      $this->load_user();
    }
  }
  function login($username,$password){
    $hash = sha1($password.SYS_SALT);
    $q  = $this->db->query("SELECT * FROM users WHERE username = ".$this->db->quote($username)." AND password = ".$this->db->quote($hash) );
    $r = $q->fetchAll(PDO::FETCH_ASSOC);
    if(count($r)>0){
      // extract the user data
      $this->data = $r[0];
      $this->session = sha1(uniqid('',TRUE).SYS_SALT);
      $this->data['session'] = $this->session;// use this session instead of old one.
      setcookie("session", $this->session,time()+60*60*24*52);
      $q = $this->db->query("UPDATE users SET session=".$this->db->quote($this->session)." WHERE uid = ".$this->db->quote($this->data['uid']) );
      $this->alert->add("Login Successful","You have been logged in.","success");
      return true;
    } else {
      $this->logout();
      $this->alert->add("Login Failed","Either your username or password are incorrect.","info");
      return false;
    }
  }
  function logout(){
    unset($this->data);
    unset($this->session);
    setcookie("session","",time()-3600);
    return true;
  }
  private function load_user(){
    $q  = $this->db->query("SELECT * FROM users WHERE session = ".$this->db->quote($this->session) );
    $r = $q->fetchAll(PDO::FETCH_ASSOC);
    if(count($r)>0){
      $this->data = $r;
    } else {
      $this->logout();
      $this->alert->add("Session Expired","Either you logged in elsewhere, or your session has expired.","info");
    }
  }
  function register($username,$password1,$password2,$repo_name){
    $this->alert->add("You!","Stop in the name of love!");
  }
}