<?php

class settings {
  public function __construct($_db,$_user,$_alert){
    $this->db = $_db;
    $this->user = $_user;
    $this->alert = $_alert;
  }

  public function get_repo_name(){
    $q = $this->db->query("SELECT repo_name FROM users WHERE uid=".$this->db->quote($this->user->data['uid']));
    $rs = $q->fetchAll(PDO::FETCH_ASSOC);
    return $rs[0]['repo_name'];
  }

  public function update_repo_name($new_name){
    if($this->user->data['repo_name'] != $new_name){
      if(!preg_match("@^[a-zA-Z0-9\_\s]{2,64}$@",$new_name)){
        $this->alert->add("Invalid Repository Name","Repository names must be 4 to 64 characters and may only contain a-z, A-Z, 0-9, ` ` and `_`.","info");
        return false;
      } else {
        $q = $this->db->query("UPDATE users SET repo_name=".$this->db->quote($new_name)." WHERE uid=".$this->db->quote($this->user->data['uid']));
        $this->alert->add("Repository Updated","Your Repository Name has been updated.","success");
        return true;
      }
    }
  }

  public function update_user_password($cur,$new1,$new2){
    if($this->user->data['password'] != $this->password_hash_generate($cur)){
      $this->alert->add("Invalid Password","Current password does not match.","info");
      return false;
    }
    if($new1 != $new2){
      $this->alert->add("Mismatch Passwords","New passwords do not match.","info");
      return false;
    }
    $q = $this->db->query("UPDATE users SET password=".$this->db->quote($this->password_hash_generate($new1))." WHERE uid=".$this->db->quote($this->user->data['uid']));
    $this->alert->add("Password Updated","Your password has been updated.","success");
    return true;
  }

  private function password_hash_generate($password){
    return sha1($password.SYS_SALT);
  }
}
