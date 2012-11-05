<?php
if(isset($user->session)){
$cron = new poormanscron();
$issues = new issues($db,$user,$cron);
echo "<pre>".print_r($issues,1)."</pre>";
?>
<h2>Issues</h2>
<table class="table table-striped">
  <thead>
    <tr>
      <th>Issue id</th>
    </tr>
  </thead>
<?php
$user_issues = $issues->get_user_issues();
foreach($user_issues as $user_issue){
?>
  <tbody>
    <tr>
      <td><?php echo print_r($user_issue,1); ?></td>
    </tr>
  </tbody>
<?php
}
if($count == 0){
?>
  <tbody>
    <tr>
      <td>No issues yet.</td>
    </tr>
  </tbody>
<?php
}
?>
</table>
<?php
} else {
  login_form();
}
