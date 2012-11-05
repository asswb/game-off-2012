<?php
if(isset($user->session)){
  if($user->data['issue']){
    $alert->add("Cannot Start Issue","There is already an active issue.","info");
  } else {
    $issue = $issues->get_user_issue($_POST['uiid']);
    if($issue and $issue['uid'] == $user->data['uid'] ){
      $issues->set_current_issue($issue['iid']);
      $alert->add("Start Issue","The issue has been started.","success");
    } else {
      $alert->add("Invalid Issue UIID","uiid lookup failed or owner mismatch.","error");
    }
  }
}