<?
if( $_POST )
{
  $finmsg = ""; //Feedback message variable
  $fileuploaded = 0;
  //Database connection variables
	$servername = "localhost";
  $susername = "leminhye_user";
  $spassword = "1Q2S3C";
  $dbname = "leminhye_data";
  // Create connection
  $conn = mysqli_connect($servername, $susername, $spassword, $dbname);
  // Check connection
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }
  //Post data variables
  $fname = $_POST['fname'];
  $mname = $_POST['mname'];
  $lname = $_POST['lname'];
  $gender = $_POST['genderrad'];
  $dob_day = $_POST['dobday'];
  $dob_month = $_POST['dobmonth'];
  $dob_year = $_POST['dobyear'];	
  $country = ($_POST['thaination']) ? $_POST['thaination'] : $_POST['othernation']; //this will call a 'notice' if thaination returns false
  $about_you = $_POST['aboutyou'];
  $email = $_POST['email'];
  $jdate = date("Y.m.d");
  //Username loop variables
  $usrchk = 0;
  $usrcounter = 1;
  //Username collectors
  $username = substr($email, 0, strpos($email, '@'));
  $tempusr = $username;
  //Username increment loop
  while ($usrchk == 0) {
  $conn2 = mysqli_connect($servername,$susername,$spassword,$dbname);
  $query = "SELECT * FROM tbl_tutors WHERE username='".$tempusr."'";
  $result = mysqli_query($conn2,$query);
  $count = mysqli_num_rows($result);
   if($count>=1){
        $tempusr = $username . "" . $usrcounter;
        $usrcounter++;
     }
   else{
     //insert query goes here
        $username = $tempusr;
        $usrchk = 1;
      }
  }
  //Email confirmation hash
  $hash = md5( rand(0,1000) );
  //The rest of post data variables
  $phone_no = $_POST['phoneno'];
  $school = $_POST['school'];
  $degree =  $_POST['degree'];
  $s_year_f = $_POST['Syearfrom'];
  $s_year_t = $_POST['Syearto'];
  $company = $_POST['company'];
  $position = $_POST['position'];
  $website = $_POST['website'];
  $w_year_f = $_POST['Wyearfrom'];
  $w_year_t = $_POST['Wyearto'];
  $pass = bin2hex(openssl_random_pseudo_bytes(4));
  //format is for storage in a Mysql database
  $dob_date = $dob_year."-".$dob_month."-".$dob_day;
  //File upload script
  $filename = $_FILES["file"]["name"];
  $file_basename = substr($filename, 0, strripos($filename, '.')); // get file extention
  $file_ext = substr($filename, strripos($filename, '.')); // get file name
  $filesize = $_FILES["file"]["size"];
  $allowed_file_types = array('.png','.jpg','.JPEG','.tiff','.targa');  //Allowed formats
  if (in_array($file_ext,$allowed_file_types) && ($filesize < 50000000)){ 
    // Rename file
    $newfilename = $username; 	  
   // Create a Unique User Directory
  $directory_path = "uploads/".$username;
  $create_dir = mkdir($directory_path,0777,false); //0600 = READ & WRITE for OWNER, Nothing for everybody else //false = only on directory ($username) is being created compared to "uploads" and $username
	if($create_dir){			  
		$usr_dir = $directory_path."/"; 
	}else{
		echo 'The user folder could not be created';
	}
    if (file_exists($usr_dir . $newfilename . $file_ext)){
      // file already exists error
      echo "You have already uploaded this file.";
    }
    else{   
      move_uploaded_file($_FILES["file"]["tmp_name"], $usr_dir. $newfilename . $file_ext);
      //echo "File uploaded successfully.";
      $fileuploaded = 1;
    }
  }
  elseif (empty($file_basename)){ 
    // file selection error
    echo "Please select a file to upload.";
  } 
  elseif ($filesize > 50000000){ 
    // file size error
    echo "The file you are trying to upload is too large.";
  }
  else{
    // file type error
    echo "Only these file types are allowed for upload: " . implode(', ',$allowed_file_types);
    unlink($_FILES["file"]["tmp_name"]);
  }
  //End file upload script
  //Query submission
  if ($fileuploaded == 1) {
  $sql= "
  INSERT INTO tbl_tutors (first_name, middle_name, last_name, gender, hash, join_date, birth_date, country_residence, about_you, school, degree, email, s_year_from, username, s_year_to, company, password, phone, position, website, w_year_from, w_year_to) 
        VALUES ('$fname', '$mname', '$lname', '$gender', '$hash', curdate(), '$dob_date', '$country', '$about_you', '$school', '$degree', '$email', '$s_year_f', '$username', '$s_year_t', '$company', '$pass', '$phone_no', '$position', '$website', '$w_year_f', '$w_year_t')";
  }
  if (mysqli_query($conn, $sql)) {
      $finmsg =  "You have successfully signed up! Check your email for a verification link!";
  } else {
      $finmsg = "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  mysqli_close($conn);
  }
  //Email confirmation sender
  $to      = $email; // Send email to our user
  $subject = 'TutorClub registration'; // Give the email a subject 
  //include 'includes/email.php';
   $message = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
<title>Demystifying Email Design</title>
<meta name='viewport' content='width=device-width, initial-scale=1.0'/>
</head>
<body style='margin:0;padding:0'>
<table border='0' cellpadding='0' cellspacing='0' width='100%'>
<tr>
<td style='padding:10px 0 30px 0'>
<table align='center' border='0' cellpadding='0' cellspacing='0' width='600' style='border:1px solid #ccc;border-collapse:collapse'>
<tr>
<td align='center' bgcolor='#000000' style='background-repeat:repeat;background-image:url(https://www.toptal.com/designers/subtlepatterns/patterns/ep_naturalblack.png);padding:20px 0 10px 0;color:#153643;font-size:28px;font-weight:bold;font-family:Arial,sans-serif'>
<h1 style='font-size:35px;color:white'>Welcome to TutorClub!</h1>
</td>
</tr>
<tr>
<td bgcolor='#ffffff' style='padding:30px 30px 40px 30px'>
<table border='0' cellpadding='0' cellspacing='0' width='100%'>
<tr>
<td style='color:#153643;font-family:Arial,sans-serif;font-size:24px;text-align:center;padding-bottom:10px'>
<b>Thank you for registering with us!</b>
</td>
</tr>
<tr>
<td style='padding:20px 0 30px 0;color:#153643;font-family:Arial,sans-serif;font-size:16px;line-height:20px'>
Please confirm your email address by clicking this button:
</td>
</tr>
<tr>
<td style='padding:0 0 10px 0;color:#153643;font-family:Arial,sans-serif;font-size:16px;line-height:20px;text-align:center'>
<a style='display:inline-block;width:200px;height:50px;background-color:#70bbd9;color:white;font-weight:bold;font-size:25px;text-decoration:none;line-height:50px;text-align:center' href='http://www.tutorclub.site/verify.php?email=".$email."&hash=".$hash."'>Confirm Email</a>
</td>
</tr>
<tr>
<td style='padding:20px 0 10px 0;color:#153643;font-family:Arial,sans-serif;font-size:16px;line-height:20px;text-align:justify'>
If you are having any problems with the button, copy and paste the following link into your browser's address bar:
</td>
</tr>
<tr>
<td style='padding:20px 0 30px 0;color:#153643;font-family:Arial,sans-serif;font-size:16px;line-height:20px'>
<a href='http://www.tutorclub.site/verify.php?email=".$email."&hash=".$hash."'>http://www.tutorclub.site/verify.php?email=".$email."&hash=".$hash."</a>
</td>
</tr>
<tr>
<td style='padding:0;color:#153643;font-family:Arial,sans-serif;font-size:10px;color:gray;line-height:20px;text-align:justify'>
This email was sent out automatically. Do not reply to this email, instead, if you have any quetions or concerns, please send an email to <a style='color:gray'href=''>support@tutorclub.site</a>. This wasn't you? <a style='color:gray' href=''>Click here</a> if you have received this e-mail by mistake.
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td bgcolor='#000000' style='padding:30px 30px 30px 30px;background-repeat:repeat;background-image:url(https://www.toptal.com/designers/subtlepatterns/patterns/ep_naturalblack.png)'>
<table border='0' cellpadding='0' cellspacing='0' width='100%'>
<tr>
<td style='color:#fff;font-family:Arial,sans-serif;font-size:14px' width='75%'>
&copy; TutorClub 2017<br/>
</td>
<td align='right' width='25%'>
<table border='0' cellpadding='0' cellspacing='0'>
<tr>
<td style='font-family:Arial,sans-serif;text-align:center;font-size:12px;font-weight:bold'>
<a href='http://www.tutorclub.site/' style='color:#fff'>
Back to site
</a></td></tr></table></td></tr></table></td></tr></table></td></tr></table></body></html>";

// To send HTML mail, the Content-type header must be set
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=iso-8859-1';

// Additional headers
$headers[] = 'To: ' . $fname . ' <' . $email . '>';
$headers[] = 'From: TutorClub <noreply@tutorclub.site>';
//$headers[] = 'Cc: birthdayarchive@example.com';
//$headers[] = 'Bcc: birthdaycheck@example.com';

// Mail it
mail($to, $subject, $message, implode("\r\n", $headers));
// Our message above including the link
/*
//add headers
$headers  = "MIME-Version: 1.0\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\n";
$headers .= "To: ". $email . "\n";
$headers .= "From: noreply@tutorclub.site\n";

  mail($to, $subject, $message, $headers); // Send our email
*/
include 'includes/header.php'; ?>


<div class="showcardveil"></div>
<div class="showcard2">
    
    <div class="showcasetext">
        <div class="logincontainervalid">
            <?php echo $finmsg; ?>
        </div>
    </div>
</div>
<?php
       include 'includes/simplefooter.php'; ?>