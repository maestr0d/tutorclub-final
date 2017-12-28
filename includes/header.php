<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

	$username = $_SESSION['username'];

?>
<!DOCTYPE html>
<html>
<head>
	<title>TutorClub</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/experimental.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet"><link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet"> 

	<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
<div class="navtrans">
	<div class="navtranschild">
		<div class="title">TutorClub</div>
		<div class="navigation">
			<ul class="navul"  id="navbar">
				<li class="navli"><a href="../" id="homeb" class="nava">Home</a></li>
				<li class="navli"><a href="#" id="newsb" class="nava">News</a></li>
				<li class="navli"><a href="#" id="aboutb" class="nava">About us</a></li>
				<li class="navli"><a href="#" id="contactb" class="nava">Contact</a></li>

					<?php 
						//echo "xxx";
                        if (isset($_SESSION['username']) && isset($_SESSION['id']))
						{
						 echo "<li class='navli'><a href='../admin.php' id='login' class='navaa'>$username</a></li>";
						 echo '<li class="navli"><a href="../logout.php" id="login" class="navalogin">Log out</a></li>';
						}
						else
						{
						echo '<li class="navli"><a href="../login.php" id="login" class="navalogin">Log in</a></li>';
						}
						

					?>
				
			</ul>

		</div>
	</div>
</div>