<?php

$db = new PDO(
  'mysql:host='.DB_HOST.';dbname='.DB_NAME.';',
  DB_USER,
  DB_PASS,
  array(PDO::ERRMODE_WARNING => TRUE)
);
