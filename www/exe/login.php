<?php
if(isset($user->session)){
  $alert->add("User Session Exists","Your account are currently logged in. Please log out first to change accounts.");
} else {
  $user->login($_POST['username'],$_POST['password']);
}
$page = "landing";