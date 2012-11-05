<?php
if(isset($user->session)){
  if($user->data['issue']){
    $alert->add("Cannot Wontfix Issue","There is already an active issue.","info");
  } else {
    $issue = $issues->get_user_issue($_POST['uiid']);
    if($issue and $issue['uid'] == $user->data['uid'] ){
      $db->query("DELETE FROM user_issue_table WHERE uiid=".$db->quote($_POST['uiid']));
      $alert->add("Wontfix Issue","The issue has been marked as wontfix.","success");
    } else {
      $alert->add("Invalid Issue UIID","uiid lookup failed or owner mismatch.","error");
    }
  }
}