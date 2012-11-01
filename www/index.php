<?php
require('config.php');
require('inc/alert.php');
$alert = new alert();

if(DEBUG){
  error_reporting(-1);
  $alert->add("Debug Mode","Debugging is enabled.","error");
}

if(isset($_POST['exe'])){
  $exe = $_POST['exe'];
}

if(isset($_GET['page'])){
  $page = $_GET['page'];
} elseif(isset($_POST['page'])){
  $page = $_POST['page'];
}

$valid_exes = glob("exe/*.php");
$valid_pages = glob("page/*.php");

if(isset($exe)){
  if(in_array("exe/$exe.php",$valid_exes)){
    require("exe/$exe.php");
  } else {
    $alerts->add("Invalid `exe`","The execute command, `$exe`, is invalid.","error");
  }
}

require("theme/header.php");
echo $alert->render();

if(!isset($page)){
  $page = "landing";
}

if(in_array("page/$page.php",$valid_pages)){
  require("page/$page.php");
}

require("theme/footer.php");
