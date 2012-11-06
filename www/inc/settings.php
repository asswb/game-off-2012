<?php

class setting {
  public function setting($_db,$_user){
    $this->db = $_db;
    $this->user = $_user;
  }

  public function get_repo_name(){
    return $user->data['repo_name'];
  }

  public function update_repo_name($new_name){
    if($user->data['repo_name'] != $new_name){
      if(!preg_match("@^[a-zA-Z0-9\_\s]{2,64}$@",$new_name)){
        $this->alert->add("Invalid Repository Name","Repository names must be 4 to 64 characters and ma$
        return false;
      } else {
        $q = $this->db->query("UPDATE users SET repo_name=".$new_name." WHERE uid=".$user->data['uid']);
        $this->alert->add("Repository Updated","Your Repository Name has been updated.","success");
    }
  }

  public function update_user_password($cur,$new1,$new2){
    if($user->data['password'] != $user->password_hash_generate($cur)){
      $this->alert->add("Invalid Password","Current password does not match.","info");
      return false;
    }
    if($new1 != $new2){
      $this->alert->add("Mismatch Passwords","New passwords do not match.","info");
      return false;
    }
    $q = $this->db->query("UPDATE users SET password=".$user->password_hash_generate($new1)." WHERE uid=".$user->data['uid']);
    $this->alert->add("Password Updated","Your password has been updated.","success");
    return true;
  }
}
