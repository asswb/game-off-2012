<?php

if($user->register($_POST['username'],$_POST['password1'],$_POST['password2'],$_POST['repo_name'])){
  $user->login($_POST['username'],$_POST['password1']);
  $page="landing";
}