<?php
if(isset($user->session)){
  if($user->data['issue']){
    $issues->set_current_issue();
    $alert->add("Issue Cancelled","Issue has been cancelled.","success");
  } else {
    $issue = $issues->get_user_issue($_POST['uiid']);
    if($issue and $issue['uid'] == $user->data['uid'] ){
      $alert->add("Cannot Cancel Issue","There are no action issues.","info");
    } else {
      $alert->add("Invalid Issue UIID","uiid lookup failed or owner mismatch.","error");
    }
  }
}

