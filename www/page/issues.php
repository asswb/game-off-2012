<?php
if(isset($user->session)){
?>
<h2>Issues</h2>
<?php
  if($current_issue = $issues->get_current_issue()){
    $max = $issues->calculate_eta($current_issue);
    $current = $user->data['issue_eta']-time();
    $percent = floor((1-$current/$max)*100);
    $remain = $user->data['issue_eta'] - time();
?>
<h4>Working on issue `<?php echo $current_issue['name']; ?>`.</h4>
<p id="issprg_text"><span id="issprg_counter"><?php echo $remain; ?></span> seconds remain.</p>
<div id="issprg_bar_style" class="progress progress-striped active">
  <div id="issprg_bar" class="bar" style="width: <?php echo $percent; ?>%;"><?php echo $percent; ?>%</div>
</div>
<div>
  <form action="" method="POST">
    <input type="hidden" id="page" name="page" value="issues" />
    <input type="hidden" id="exe" name="exe" value="issue-cancel" />
    <input class="btn btn-danger" type="submit" value="Cancel Issue" />
  </form>
</div>
<script>
  var issprg_seconds = <?php echo $current; ?>;

  function issprg_display(){
    issprg_seconds--;
    if(issprg_seconds>=0){
      document.getElementById("issprg_counter").innerHTML=issprg_seconds;
      document.getElementById("issprg_bar").style.width=(100-Math.floor(issprg_seconds/<?php echo $max; ?>*100))+"%";
      document.getElementById("issprg_bar").innerHTML=document.getElementById("issprg_bar").style.width;
      setTimeout("issprg_display()",1000);
    } else {
      document.getElementById("issprg_text").innerHTML='Issue Complete';
      document.getElementById("issprg_bar_style").className='progress progress-success progress-striped';
      document.getElementById("issprg_bar").style.width='100%';
    }
  }
  issprg_display();
</script>

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
