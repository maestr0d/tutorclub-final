<?php
	include 'includes/sessionset.php';
	if(isset($_SESSION['username'])){
	   header("Location: admin.php");
	}
	require('includes/connect.php');
	include 'includes/cblock.php';
	
error_reporting(0);
$mess = "";
$count = 0;
$_SESSION['loginerror'] = 0;
$username = "";
$password = "";

if (isset($_POST['username']) && isset($_POST['password']))
{
   $username = $_POST['username'];
   $password = $_POST['password'];
   $query = "SELECT * FROM tbl_users WHERE username='$username' and password='$password'";
   $result = mysql_query($query) or die(mysql_error());
   $count = mysql_num_rows($result);
}

if ($count == 1)
{
   $_SESSION['username'] = $username;
   $_SESSION['loginerror'] = 0;

/////////////

	include 'includes/cblock.php';

	$sqlupdate = "UPDATE tbl_users SET attempts=0 WHERE username='$username'";

		$sql = $sqlupdate;
	
	//endqueries
	if(mysql_query($sql, $conn)){
	}
	else{
	}


////////////////////////////

   header("Location: admin.php");
}else{
}
if ($_SESSION['username'] != $username)
{
	$_SESSION['loginerror'] = 1 ;

/////////////


	include 'includes/cblock.php';

	$sqlupdate = "UPDATE tbl_users SET attempts=attempts+1 WHERE username='$username'";

		$sql = $sqlupdate;
	
	//endqueries
	if(mysql_query($sql, $conn)){
	}
	else{
	}


////////////////////////////
}
if ($_SESSION['loginerror'] > 0) 
{
    $mess = "Invalid login credentials" ;

}
if (isset($_SESSION['username']))
{
   $username = $_SESSION['username'];
}else{

}
include 'includes/header.php'; ?>



<div class="showcardveil"></div>
<div class="showcard2">
	
	<div class="showcasetext">
		<div class="logincontainer">
			<h1 class="showcaseh12">Log in</h1>
			<hr class="testline" width="50%">
			<form action="" method="POST">
				<input class="logininput" placeholder="E-mail" id="username" type="text" name="username" >
		
				<input class="logininput" placeholder="Password" id="password" type="password" name="password">
				<div class="recaptchadiv">
				<?php 
				//////////////

				$sqlStremail = "SELECT attempts
					                FROM tbl_users
					                WHERE username = '$username'";

					$result1 = mysql_query($query);

					$row1 = mysql_fetch_assoc($result1);

					$variable1 = $row1["attempts"];


				if ($variable1 >= 3) {
				 	echo "<div class='g-recaptcha' data-sitekey='6LeqiQwUAAAAAHUYOxrYDM6Qdlzoi8_DeAn2bnzf'></div>";
				 }
				//////////////
				?>
					
				</div>
			
			<br>
			<a class="loginlink">Forgot your password?</a>

			<a class="loginlink" id="hide">Not a member yet?</a>
			<br><br>
			<input  type="submit" value="Submit"  class="testloginb" value="Lets go!">

			</form>
		</div>
		<div class="logincontainer2">
			<h1 class="showcaseh12">Register</h1>
			<hr class="testline" width="50%">
			<form>
				<input type="" class="logininput" placeholder="E-mail" name="Username">
		
				<input type="" class="logininput" placeholder="Password" name="Password">
				
			</form>
			<a class="loginlink" id="hideb">Already a member?</a>

			<a class="loginlink" >Register as a tutor instead</a>
			<br><br>
			<button class="testloginb">Lets go!</button>
		</div>
	</div>
</div>
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