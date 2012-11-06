<?php
if(isset($user->session)){
  $setting->update_user_password($_POST['cur_password'],$_POST['new_password1'],$_POST['new_password2']);
}

