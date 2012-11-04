<?php
if(isset($user->session)){
  logout_form();
} else {
  login_form();
}
