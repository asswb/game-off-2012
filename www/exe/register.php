<?php
if(isset($user->session)){
  $alert->add("Cannot Register With User Session","Your account is currently logged in, and needs to be logged out to register.","info");
  $page="landing";
} else {
  if($user->register($_POST['username'],$_POST['password1'],$_POST['password2'],$_POST['repo_name'])){
    $user->login($_POST['username'],$_POST['password1']);
    $page="landing";
  }
}