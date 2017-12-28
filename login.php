<?php
    session_start();
	$errormessage = "";
	$username = "";
	$password = "";
	$uid = "";
	$yoursecret = "6LeqiQwUAAAAACUkzSK39fJQ4mUB43WjoQ8t1BBr";
	if(isset($_SESSION['username']) && isset($_SESSION['id'])){
		//IF USER LOGGED IN
		$uid = $_SESSION['id'];
		$username = $_SESSION['username'];
		//add redirect here
		header("Location: http://www.tutorclub.site/tutor.php?id=" . $uid);
	}
	else{
		if(isset($_POST['username']) && isset($_POST['password'])){
			$username = $_POST['username'];
			$password = $_POST['password'];

			$sservername = "localhost";
			$susername = "leminhye_user";
			$spassword = "1Q2S3C";
			$sdbname = "leminhye_data";

			//CAPTCHA VALIDATION
			$response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=". $yoursecret."&response=".$_POST['g-recaptcha-response']."&remoteip=".$_SERVER['REMOTE_ADDR']);
		    $googleobj = json_decode($response);
		    $verified = $googleobj->success;

			// Create connection
			$conn = new mysqli($sservername, $susername, $spassword, $sdbname);
			// Check connection
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			}

			$sql = "SELECT id, email FROM tbl_tutors WHERE email='$username' AND password='$password'";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
			    // output data of each row
			    while($row = $result->fetch_assoc()) {
			    	if($verified==true){
				    	$uid = $row["id"];
				    	$username = $row["email"]; 

				    	//SET SESSION VARIABLES
				    	$_SESSION['id'] = $uid;
				    	$_SESSION['username'] = $username;

				    	header("Location: http://www.tutorclub.site/tutor.php?id=" . $uid);
				    	exit;
			    	}
			    	else{
					    $errormessage = "Please submit captcha";
					}
			    }
			}else {
			    $errormessage = "Incorrect credentials";
			}
			$conn->close();
		}
	}
	include 'includes/header.php'; ?>

<div class="showcardveil"></div>
<div class="showcard2">
	
	<div class="showcasetext">
		<div class="logincontainer">
			<h1 class="showcaseh12">Log in</h1>
			<hr class="testline" width="50%">
			<form action="" method="POST">
				<input class="logininput" placeholder="E-mail or Username" id="username" type="" name="username" >
		
				<input class="logininput" placeholder="Password" id="password" type="password" name="password">
				<div class="errormess">
				<?php
				echo $errormessage;
				?>
				</div>
				<div class="recaptchadiv"> <div class='g-recaptcha' data-sitekey='6LeqiQwUAAAAAHUYOxrYDM6Qdlzoi8_DeAn2bnzf'></div>
				</div>
			
			<a class="loginlink">Forgot your password?</a>

			<a class="loginlink" id="hide">Not a member yet?</a>
			<br><br>
			<input  type="submit" value="Submit"  class="testloginb" value="Lets go!">

			</form>
		</div>
		<div class="logincontainer2">
		<form enctype="multipart/form-data" action="proceed.php" method="post">
			<h1 class="showcaseh12">Register</h1>
			<hr class="testline" width="50%">
				<input type="email" class="logininput" placeholder="E-mail" name="uusername">
		
				<input type="password" class="logininput" placeholder="Password" name="upassword">
				<div class="errormess"></div>
			<a class="loginlink" id="hideb">Already a member?</a>

			<a href="register.php" class="loginlink" >Register as a tutor instead</a>
			<br><br>
			<input id="submitbutt" type="submit" name="submit" value="Lets go!" class="testloginb">
			<!--<button class="testloginb">Lets go!</button>-->
		</form>
		</div>
	</div>
</div>
<?php
       include 'includes/simplefooter.php'; ?>
<script>
$(document).ready(function(){
    $("#hide").click(function(){
        $(".logincontainer").slideUp();
        $(".logincontainer2").slideDown();
    });
    $("#hideb").click(function(){
        $(".logincontainer2").slideUp();
        $(".logincontainer").slideDown();
    });




    /*
    $("#show").click(function(){
        $(".logincontainer").show();
    });*/
});
</script>