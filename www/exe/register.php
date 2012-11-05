<?php
if(isset($user->session)){
  $alert->add("Cannot Register With User Session","You are currently logged in, and need to be logged out to register.","info");
  $page="landing";
} else {
  if($user->register($_POST['username'],$_POST['password1'],$_POST['password2'],$_POST['repo_name'])){
    $user->login($_POST['username'],$_POST['password1']);
    $page="landing";
  }
}