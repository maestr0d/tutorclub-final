<?php
$errormessage = "";

   $yoursecret = "6LcVuxEUAAAAACtyMLy-KDyup8YwULdrXnB7lkR_";

    $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=". $yoursecret."&response=".$_POST['g-recaptcha-response']."&remoteip=".$_SERVER['REMOTE_ADDR']);
    $googleobj = json_decode($response);
    $verified = $googleobj->success;


if( $_POST ){
	if (isset($_POST['uusername']) && isset($_POST['upassword'])){
	  $usr = $_POST['uusername'];
	  $pass = $_POST['upassword'];
	}
	if (isset($_POST['fusername']) && isset($_POST['fpassword']) && isset($_POST['fpasswordc']))
	{
		  if ($verified == true) {
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

				  $susr = $_POST['fusername'];
				  $spass = $_POST['fpassword'];
				  //Email confirmation hash
				  $hash = md5( rand(0,1000) );

				  $sql= "
				  INSERT INTO tbl_users (email, password, join_date, hash) 
				        VALUES ('$susr', '$spass', curdate(), '$hash')";
				  
				  if (mysqli_query($conn, $sql)) {
		  				$errormessage = "Success!";
				  } else {
		  				$errormessage = "Something went wrong!";
				  }

				  mysqli_close($conn);
					/*echo $usr;
					echo $pass;*/


					  //Email confirmation sender
					  $to      = $susr; // Send email to our user
					  $subject = 'Signup | Verification'; // Give the email a subject 
					  $message = '
					   
					  Thanks for signing up with TutorClub!
					  Your account has been created! Confirm your email by clicking the link below:
					   
					  Account activation url:
					  http://www.tutorclub.site/verify.php?usermail='.$susr.'&userhash='.$hash.'
					   
					  '; // Our message above including the link

					  
					  $headers .= "Organization: TutorClub.site\r\n";
					  $headers .= "MIME-Version: 1.0\r\n";
					  $headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
					  $headers .= "X-Priority: 3\r\n";
					  $headers .= "X-Mailer: PHP". phpversion() ."\r\n"; 

					  $headers .= "Reply-To: The Sender <noreply@tutorclub.site>\r\n";
					  $headers .= "Return-Path: The Sender <noreply@tutorclub.site>\r\n";
					                       
					  $headers .= 'From:n <noreply@tutorclub.site>' . "\r\n"; // Set from headers
					  mail($to, $subject, $message, $headers); // Send our email


		
		  }
		  else{
		  	$errormessage = "Please submit captcha!";
		  }
	}
	else{
		$errormessage = "Please enter your credentials!";
	}








}


include 'includes/header.php'; ?>



<div class="showcardveil"></div>
<div class="showcard2">
	
	<div class="showcasetext">
		<div class="logincontainer">
		<form enctype="multipart/form-data" action="proceed.php" method="post">
			<h1 class="showcaseh12">Just one more step!</h1>
			<hr class="testline" width="50%">
				<input type="email" class="logininput" value="<?php echo $usr; ?>" required="required" placeholder="E-mail" name="fusername">
		
				<input type="password" class="logininput"  value="<?php echo $pass; ?>" required="required" placeholder="Password" name="fpassword" id="rgrpass1">
				<input type="password" class="logininput"  value="" required="required"  oninput="check(this)" placeholder="Confirm password" name="fpasswordc" id="rgrpass2">
				<div class="errormess">
				<?php
				echo $errormessage;
				?>
				</div>
				<!-- FIELD VALIDATION-->
				<script language='javascript' type='text/javascript'>
				    function check(input) {
				        if (input.value != document.getElementById('rgrpass1').value) {
				            input.setCustomValidity('Password Must be Matching.');
				        } else {
				            // input is valid -- reset the error message
				            input.setCustomValidity('');
				        }
				    }
				</script>
				<div class="recaptchadiv"> 
			<div class="g-recaptcha" data-sitekey="6LcVuxEUAAAAAAhV6MlWmlPNqFohDlKfbfM0OguF"></div></div>
			<input id="submitbutt" type="submit" name="submit" value="Lets go!" class="testloginb">
			<!--<button class="testloginb">Lets go!</button>-->
		</form>
		</div>
	</div>
</div>
<script type="text/javascript">
	
</script>
<?php include 'includes/simplefooter.php'; ?>

