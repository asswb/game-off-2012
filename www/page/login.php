<?php
if(isset($user->session)){
?>
<h4>You're already logged in!</h4>
<?php
} else {
  login_form();
}
?>
