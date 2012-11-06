<?php
if(isset($user->session)){
  $setting->update_repo_name($_POST['repo_name']);
}

