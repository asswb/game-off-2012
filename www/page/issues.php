<?php
if(isset($user->session)){
?>
<h2>Issues</h2>
<?php
  if($current_issue = $issues->get_current_issue()){
    echo "<pre>".print_r($user->data,1)."</pre>";
    echo "<pre>".print_r($current_issue,1)."</pre>";
?>
<div class="progress">
  <div class="bar" style="width: 60%;"></div>
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
