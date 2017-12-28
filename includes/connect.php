<?php

  //var $host;
  //var $username;
  //var $password;
  //var $table;

$connection = @mysql_connect('localhost', 'leminhye_user', '1Q2S3C');
if (!$connection){
    die("Database Connection Failed" . mysql_error());
}
$select_db = @mysql_select_db('leminhye_data');
if (!$select_db){
    die("Database Selection Failed" . mysql_error());
}