<?php

$alert = new alert();

class alert {
  private $alerts = array();
  public function render(){
    $output = '';
    foreach($this->alerts as $alert){
      $output .= '
      <div class="row">
        <div class="span6 alert alert-block'.( ($alert->type=='')?(''):(' alert-'.$alert->type) ).'">
          <h4>'.$alert->title.'</h4>
          '.$alert->message.'
        </div>
      </div>';
    }
    return $output;
  }
  public function add($title,$message,$type=""){
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