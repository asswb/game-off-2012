<?php

$alerts = new alert();

class alert {
  private $alerts = array();
  function render(){
    $output = '';
    foreach($this->alerts as $alert){
      $output .= '
      <div class="alert alert-block'.( ($alert->type=='')?(''):(' alert-'.$alert->type) ).'">
        <h4>'.$alert->title.'</h4>
        '.$alert->message.'
      </div>';
    }
    return $output;
  }
  function add($title,$message,$type=""){
    $tmp = new stdClass();
    $tmp->title = $title;
    $tmp->message = $message;
    $valid_types = array("","success","error","info");
    if(!in_array($type,$valid_types)){
      $type = "";
    }
    $tmp->type = $type;
    $this->alerts[] = $tmp;
  }
}