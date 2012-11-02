<?php
require('config.php');

if(DEBUG){
  error_reporting(-1);
}

$incs = glob("inc/*.php");
foreach($incs as $inc){
  require($inc);
}

if(DEBUG){
  $alert->add("Debug Mode","Debugging is enabled.","error");
  $alert->add('$_POST','<pre>'.print_r($_POST,1).'</pre>');
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
    $alert->add("Invalid `exe`","The execute command, `$exe`, is invalid.","error");
  }
}

$header_pages = array();
if(isset($user->session)){
  $header_pages['issues'] = "Issues";
  $header_pages['logout'] = "Logout";
} else {
  $header_pages['login'] = "Login";
  $header_pages['register'] = "Register";
}
$header_pages['leaderboard'] = "Leaderboard";

require("theme/header.php");
echo $alert->render();

if(!isset($page)){
  $page = "landing";
}

if(in_array("page/$page.php",$valid_pages)){
  require("page/$page.php");
}

require("theme/footer.php");
