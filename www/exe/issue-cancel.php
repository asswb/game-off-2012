<?php
if(isset($user->session)){
  if($user->data['issue']){
    $issues->set_current_issue();
    $alert->add("Cancel Issue","The issue has been cancelled.","success");
  } else {
    $issue = $issues->get_user_issue($_POST['uiid']);
    if($issue and $issue['uid'] == $user->data['uid'] ){
      $alert->add("Cannot Cancel Issue","No active issue.","info");
    } else {
      $alert->add("Invalid Issue UIID","uiid lookup failed or owner mismatch.","error");
    }
  }
}

