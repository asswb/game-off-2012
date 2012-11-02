<?php

function check_username_size($user){
  if(strlen($user) > 32)
    return false;
  return true;
}

function check_username($user){
  global $db;
  $q = $db->query('SELECT COUNT(*) FROM users WHERE username="'.$user.'"');
  $count = $q->fetch(PDO::FETCH_ASSOC);
  echo $count['COUNT(*)'];
  if($count['COUNT(*)'] > 0)
    return true;
  return false;
}

function auth_user($user,$pass){
  global $db;
  $salt = SYS_SALT;
  $enc_pass = sha1($salt.$pass.$salt); 
  $q = $db->query('SELECT COUNT(*) FROM users WHERE username="'.$user.'" AND password="'.$enc_pass.'"');
  if($count['COUNT(*)'] == 1) 
    return true;
  return false;
}

?>
