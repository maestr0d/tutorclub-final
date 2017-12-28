<?php
	$dbhost = 'localhost';
	$dbuser = 'leminhye_user';
	$dbpass = '1Q2S3C';
	$conn = @mysql_connect($dbhost, $dbuser, $dbpass);
   
   if(! $conn )
   {
      die('Could not connect: ' . mysql_error());
   }
   
    mysql_select_db('leminhye_data');
?>