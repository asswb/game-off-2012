<?php

$user = new user($db,$alert);

class user {
  public $data = null;
  public $alert = null;
  public function __construct($db,&$alert){
    $this->db = $db;
    $this->alert = $alert;
    if(isset($_COOKIE['session'])){
      $this->session = $_COOKIE['session'];
      $this->load_user();
    }
  }
  private function password_hash_generate($password){
    return sha1($password.SYS_SALT);
  }
  public function login($username,$password){
    $hash = $this->password_hash_generate($password);
    $q  = $this->db->query("SELECT * FROM users WHERE username = ".$this->db->quote($username)." AND password = ".$this->db->quote($hash) );
    $r = $q->fetchAll(PDO::FETCH_ASSOC);
    if(count($r)>0){
      // extract the user data
      $this->data = $r[0];
      $this->session = sha1(uniqid('',TRUE).SYS_SALT);
      $this->data['session'] = $this->session;// use this session instead of old one.
      setcookie("session", $this->session,time()+60*60*24*52);
      $q = $this->db->query("UPDATE users SET session=".$this->db->quote($this->session)." WHERE uid = ".$this->db->quote($this->data['uid']) );
      $this->alert->add("Login Successful","Your account has been logged in.","success");
      return true;
    } else {
      $this->logout();
      $this->alert->add("Login Failed","Either the username or password is incorrect.","info");
      return false;
    }
  }
  public function logout(){
    unset($this->data);
    unset($this->session);
    setcookie("session","",time()-3600);
    return true;
  }
  private function load_user(){
    $q = $this->db->query("SELECT * FROM users WHERE session = ".$this->db->quote($this->session) );
    $r = $q->fetchAll(PDO::FETCH_ASSOC);
    if(count($r)>0){
      $this->data = $r[0];
    } else {
      $this->logout();
      $this->alert->add("Session Expired","The session has expired. Please log back in.","info");
    }
  }
  public function register($username,$password1,$password2,$repo_name){
    // Check username; 4-32 alphanumeric characters and numbers with underscores
    if(!preg_match("@^[a-zA-Z0-9\_]{4,32}$@",$username)){
      $this->alert->add("Invalid Username","Usernames must be 4 to 32 characters and may only contain a-z, A-Z, 0-9 and `_`.","info");
      return false;
    }
    $q = $this->db->query("SELECT uid FROM users WHERE username = ".$this->db->quote($username));
    $r = $q->fetchAll(PDO::FETCH_ASSOC);
    if(count($r)>0){
      $this->alert->add("Username Already Exists","This username has already been registered.","info");
      return false;
    }
    if($password1 != $password2){
      $this->alert->add("Password Mismatch","The passwords supplied do not match.","info");
      return false;
    }
    if(!preg_match("@^[a-zA-Z0-9\_\s]{2,64}$@",$repo_name)){
      $this->alert->add("Invalid Repository Name","Repository names must be 4 to 64 characters and may only contain a-z, A-Z, 0-9, ` ` and `_`.","info");
      return false;
    }
    $hash = $this->password_hash_generate($password1);
    $q = $this->db->query("INSERT INTO users (username,password,repo_name) VALUES (".$this->db->quote($username).",".$this->db->quote($hash).",".$this->db->quote($repo_name).")");
    $this->alert->add("Registration Successful","Your account have been registered!","success");
    return true;
  }
}