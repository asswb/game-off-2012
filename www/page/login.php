<?php
if(isset($user->session)){
?>
<h2>Login</h2>
<h4>Your account is already logged in!</h4>
<?php
} else {
  login_form();
}
