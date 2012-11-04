<?php
if(isset($user->session)){
?>
<h2>Welcome to GitHub Tycoon!</h2>
<p>Welcome to the Beta version!</p>
<p>This game is brought to you by <a href="https://github.com/josefnpat">josefnpat</a> and <a href="https://github.com/peterrstanley">peterrstanley</a>.</p>
<p>Technologies used;</p>
<ul>
<li>PHP</li>
<li>MySQL</li>
<li>Twitter Bootstrap</li>
</ul>
<?php
} else {
?>
<h4>Welcome to GitHub Tycoon! Please login or register to play!</h4>
<?php
  login_form();
}
?>
