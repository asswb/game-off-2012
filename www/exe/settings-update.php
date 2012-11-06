<?php
if(isset($user->session)){
  $setting = new setting($db,$user);
  $setting->update_repo_name($_POST['repo_name']);
  if($_POST['new_password1'] != '' || $_POST['new_password2'] != ''){
    $setting->update_user_password($_POST['cur_password'],$_POST['new_password1'],$_POST['new_password2']);
  }
}

