<?php
if(isset($user->session)){
?>
<h2><?php echo $user->data['repo_name']; ?></h2>
<dl class="dl-horizontal">
  <dt>Community</dt>
  <dd><?php echo $user->data['com'];?> people</dd>
  <dt>Code Base Quality</dt>
  <dd><?php echo $user->data['cbq']*100;?>%</dd>
  <dt>Score</dt>
  <dd><?php echo $user->data['com']*$user->data['cbq'];?></dd>
</dl>
<?php
} else {
?>
<h2>Welcome</h2>
<h4>Welcome to GitHub Tycoon! Please <a href="?page=login">login</a> or <a href="?page=register">register</a> to play!</h4>
<p>Welcome to the Beta version!</p>
<p>Technologies used;</p>
<ul>
  <li>PHP</li>
  <li>MySQL</li>
  <li>Twitter Bootstrap</li>
  <li>Bootswap</li>
</ul>
<p>Statistics:</p>
<ul>
<li>Total Users: <?php
$q = $db->query("SELECT COUNT(uid) as total FROM `users`");
$r = $q->fetchAll(PDO::FETCH_ASSOC);
echo $r[0]['total'];
?></li>
</ul>
<?php
  login_form();
}
