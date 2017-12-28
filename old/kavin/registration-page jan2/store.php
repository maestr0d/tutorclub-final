<!-- 

Things to do


1) dob_date needs to have a 'yyyy-mm-dd' format [done]
2) patch up security (Arthur pls do it).

comments

1) took a look at the $_POST data and it seems to be fine

-->

<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	
	
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$lname = $_POST['lname'];
//$profile_image 
$gender = $_POST['genderrad'];
$dob_day = $_POST['dobday'];
$dob_month = $_POST['dobmonth'];
$dob_year = $_POST['dobyear'];	
$country = ($_POST['thaination']) ? $_POST['thaination'] : $_POST['othernation']; //this will call a 'notice' if thaination returns false
$about_you = $_POST['aboutyou'];
$email = $_POST['email'];
$phone_no = $_POST['phoneno'];
$school = $_POST['school'];
$degree =  $_POST['degree'];
$s_year_f = $_POST['Syearfrom'];
$s_year_t = $_POST['Syearto'];
$company = $_POST['company'];
$position = $_POST['position'];
$w_year_f = $_POST['Wyearfrom'];
$w_year_t = $_POST['Wyearto'];
$toc = $_POST['tocbox']; //not in db

//format is for storage in a Mysql database
$dob_date = $dob_year."-".$dob_month."-".$dob_day;

echo($dob_date);


	



print_r($_POST);

?>