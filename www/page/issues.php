<?php
if(isset($user->session)){
$cron = new poormanscron();
$issues = new issues($db,$user,$cron);
?>
<h2>Issues</h2>
<table class="table table-striped">
  <thead>
    <tr>
      <th>Name</th>
      <th>Description</th>
      <th></th>
      <th>Time to Complete</th>
      <th></th>
    </tr>
  </thead>
<?php
$user_issues = $issues->get_user_issues();
foreach($user_issues as $user_issue){
  echo $issues->render_teaser($user_issue);
}
if(count($user_issues) == 0){
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
