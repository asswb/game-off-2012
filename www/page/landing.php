<?php
if(isset($user->session)){
?>
<h2>Welcome to GitHub Tycoon!</h2>
<p>Welcome to the Beta version!</p>
<p>Technologies used;</p>
<ul>
<li>PHP</li>
<li>MySQL</li>
<li>Twitter Bootstrap</li>
</ul>
<?php
} else {
?>
<h2>Welcome</h2>
<h4>Welcome to GitHub Tycoon! Please login or register to play!</h4>
<?php
  login_form();
}
