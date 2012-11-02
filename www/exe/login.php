<?php
$user = new user($db,"");
$user->login($_POST['username'],$_POST['password']);