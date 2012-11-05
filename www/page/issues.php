<?php
if(isset($user->session)){
?>
<h2>Issues</h2>
<?php
  if($current_issue = $issues->get_current_issue()){
    $max = $issues->calculate_eta($current_issue);
    $current = $user->data['issue_eta']-time();
    $percent = floor((1-$current/$max)*100);
?>
<h4>Working on issue `<?php echo $current_issue['name']; ?>`.</h4>
<p><?php echo $issues->stostr($user->data['issue_eta'] - time()); ?> remain.</p>
<div class="progress progress-striped">
  <div class="bar" style="width: <?php echo $percent; ?>%;"><?php echo $percent; ?>%</div>
</div>
<?php
  } else {
?>
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
  }
} else {
  login_form();
}
