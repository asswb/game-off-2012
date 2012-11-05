<?php
if(file_exists('config.php')){
  require('config.php');
} else {
  die("<h1>Missing `config.php`</h1><p>To continue, please copy `config.sample.php` to `config.php` and supply the appropriate defines.</p>");
}

if(DEBUG){
  error_reporting(-1);
}

// Load dependent classes first.
// TODO: Make this list static once the MVP is over.
require("inc/db.php");
require("inc/alert.php");
require("inc/user.php");
require("inc/poormanscron.php");

// Lazy Load everything else
$incs = glob("inc/*.php");
foreach($incs as $inc){
  require_once($inc);
}

if(DEBUG){
  $alert->add('Debug Mode is enabled',
    '<p>'.(count($_GET)>0?'<pre>$_GET:'.print_r($_GET,1).'</pre>':'<strike>$_GET</strike>').'</p>'.
    '<p>'.(count($_POST)>0?'<pre>$_POST:'.print_r($_POST,1).'</pre>':'<strike>$_POST</strike>').'</p>',
    "error");
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
$header_pages['leaderboard'] = "Leaderboard";
if(isset($user->session)){
  $header_pages['issues'] = "Issues <span class=\"badge badge-inverse\">".$issues->count()."</span>";
  $header_pages['logout'] = "Logout <span class=\"badge badge-inverse\">".$user->data['username']."</span>";
} else {
  $header_pages['register'] = "Register";
  $header_pages['login'] = "Login";
}

require("theme/header.php");
echo $alert->render();

if(!isset($page) or !file_exists("page/$page.php")){
  $page = "landing";
}

if(in_array("page/$page.php",$valid_pages)){
  require("page/$page.php");
}

require("theme/footer.php");
