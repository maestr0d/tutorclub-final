<?php
session_start();
 //check for get values
$testmsg = "";
if(isset($_GET['id']) && !empty($_GET['id'])){
	$id = $_GET['id'];


	$sservername = "localhost";
    $susername = "leminhye_user";
    $spassword = "1Q2S3C";
    $sdbname = "leminhye_data";

	// Create connection
	$conn = new mysqli($sservername, $susername, $spassword, $sdbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	$sql = "SELECT * FROM tbl_tutors WHERE id = '$id'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	    	$fname = $row["first_name"];
	    	$mname = $row["middle_name"];
	    	$lname = $row["last_name"];
	    	$desc = $row["about_you"];

	    	$email = $row["email"];
	    	$phone = $row["phone"];

	    	if($row["gender"] == "m"){
	    		$gender = "Male";
	    	}
	    	else if($row["gender"] == "f"){
	    		$gender = "Female";
	    	}
	    	else{
	    		$gender = "Unspecified";
	    	}
	    	$age = floor((time() - strtotime($row["birth_date"])) / 31556926);
	    	$desc = $row["about_you"];

	    	$usrn = $row["username"];
	        //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
	    }
	} else {
	    echo "0 results";
	}

	//$filename = "uploads/" . $usrn . ".jpg";
	//$filename2 = "uploads/" . $usrn . ".png";
	if (file_exists("uploads/" . $usrn . "/" . $usrn . ".jpg"))
	{
	    $filename = "uploads/" . $usrn . "/" . $usrn . ".jpg";     
	}
	else if (file_exists("uploads/" . $usrn . "/" . $usrn . ".png"))
	{
		$filename = "uploads/" . $usrn . "/" . $usrn . ".png";
	}
	else{
	    $testmsg = "File does not exist.";

	}

	//RATINGS?
	$sql = "SELECT * FROM tbl_ratings WHERE tutor_id = '$id'";
	$result = $conn->query($sql);
	$ratecounter = 0;
	$ratetotal = 0;
	$rateavg = 0;
	$ratestars = "&#9734;&#9734;&#9734;&#9734;&#9734;";
	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	    	$ratecounter++;
	    	$ratetotal += $row["stars"];
	    }
	    $rateavg = $ratetotal/$ratecounter;
	    //full stars
	    if($rateavg != 0){
	    	$ratestars = "";
		    for($i = 0;$i<round($rateavg);$i++){
		    	$ratestars .= "&#9733;";
		    }
		    //empty stars
		    for($i = 0;$i<5-round($rateavg);$i++){
		    	$ratestars .= "&#9734;";
		    }	
	    }
	    else{
	    }
	    //$testrate = "&#9733;";
	} else {
	    //echo "0 results";
	}

















}
else{

}
include 'includes/header.php'; 
?> 
<div class="testshowcard" id="main"></div>
<div class="breadcrumbs">Home/Crumbs here</div>
<div class="fscc">
	<div class="tcontentleft">
		<div class="fluidwi" style="background-image:url(<?php echo $filename; ?>);"></div>
		<div class="tutorinfo">
			<div class="tutorname">
				<?php echo $fname . " " . $lname; ?>
			</div>
			<div class="tutorfav"></div>
			<div style="clear:both;"></div>
			<div class="tutorloc">
				<?php echo "Location here"; ?>
			</div>
			<div class="tutorstu">
				<?php echo $desc; ?>
			</div>
			<div class="contactdet">Rating: 
				<span class="starl"><?php echo $ratestars; ?></span>
					
				</div>
			<button class="cinfo" id="msgrn">Send a message</button>
			<button class="cinfo" id="getcd">
			<div class="cdd">
			<?php 
				//check login
				if(!isset($_SESSION['username'])){
					echo "You need to be logged in to view this info!";
				}
				else{
					echo "<b>Email: </b>" . $email;
					echo "<br>";
					echo "<b>Phone number: </b>" . $phone;
				}
				?>
			</div>
					Contact info</button>
		</div>
		<div style="clear:both;"></div>
		<div class="classlist">
			<div class="classtitleb"><b>Available classes:</b></div>
			<div class="classtable">
				<!-- class element samples -->
				<div class="classitem" id="getinfo" style="background-image:url(https://s-media-cache-ak0.pinimg.com/736x/73/00/2a/73002a6ae14924344d841dd385b431c9.jpg);">
					<div class="classinfo"></div>
					<div class="classinfo2">
						<b>Class name</b><br>
						<p>Sample class description can go here.</p>
					</div>
				</div>
				<div class="classitem" id="getinfo"  style="background-image:url(https://avocaventures.com/wp-content/uploads/2014/11/lines-of-code.jpg);">
					<div class="classinfo"></div>
					<div class="classinfo2">
						<b>Class name</b><br>
						<p>Sample class description can go here.</p>
					</div>
				</div>
				<div class="classitem" id="getinfo"  style="background-image:url(http://www.theyearoflivingsabbatically.com/wp-content/uploads/2012/11/Bob-Urichuck-guest-speaker-300x200.jpg);">
					<div class="classinfo"></div>
					<div class="classinfo2">
						<b>Class name</b><br>
						<p>Sample class description can go here.</p>
					</div>
				</div>
				<div class="classitem"></div>
				
				<div class="classitem"></div>
				<div class="classitem"></div>
				<div class="classitem"></div>
				<div style="clear:both;"></div>
			</div>
			<div class="classpagi">-- Pagination --</div>
		</div>
		<div class="classlist">
		<?php 
		//WIDTHDRAW REVIEWS FROM DATABASE HERE
		$sql = "SELECT * FROM tbl_ratings WHERE tutor_id = '$id'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		    // output data of each row
		    $countrows = 0;
		    while($row = $result->fetch_assoc()) {
		        //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
				$stustars = "";
				    for($i = 0;$i<$row["stars"];$i++){
				    	$stustars .= "&#9733;";
				    }
				    //empty stars
				    for($i = 0;$i<5-$row["stars"];$i++){
				    	$stustars .= "&#9734;";
				    }	
		        print"
					<div class='revitem'>
						<div class='userpic'></div>
						<div class='revbody'>
							<div class='titlerev'>" . $row["title"] . "</div>
							<div class='revstars'>" . $stustars . "</div>
							<div class='revtext'>" . $row["review"] . "</div>
						</div>
						<div style='clear:both;'></div>
					</div>
					";
				$countrows++;
				if($countrows == 2){
					echo "
			<div style='clear:both;'></div>";
			$countrows = 0;
				}
		    }
		} else {
		    echo "0 results";
		}
		?>
		</div>
	</div>

	<div class="tsidebarright">
	<?php
	//SIDEBAR STUFF!!
		//check login
		if(isset($_SESSION['username']) && isset($_SESSION['id'])){
			//start buttons
			print"<a href='/settings.php' class='tsba'><div class='tutorsbutton' id='tutorsetts'>Edit profile</div></a>";
			print"<div class='tutorsbutton' id='tutormsg'>Messages</div>";
			print"<div class='tutorsbutton' id='tutorclass'>Classes</div>";
		}
		else{
			//not logged in
		}
	?>
	</div>
	<div style="clear:both;"></div>
</div>
<script src="scripts/headerbg.js"></script> <!-- JQUERY HEADER BACKGROUND. DO NOT REMOVE!-->
<?php 


	$conn->close();


include 'includes/footer.php';?>
<!-- <button class="msgt">Send a message</button>
		<div class="statleft">Classes provided: </div>
		<div class="statleft">Students worked with: </div>
		<div class="stdleftcont">
			<p class="stdltitle">Education</p>
		</div>
		<div class="tutorname">
			<?php// echo $fname . " " . $mname . " " . $lname; ?>
		</div>
		<button class="tutorfav"></button>
		<div style="clear:both;"></div>
		<div class="tutorgender">
			<?php //echo "Gender: " . $gender; ?>
		</div>
		<div class="tutorgender">
			<?php// echo "Age: " . $age; ?>
		</div>
		<p class="tutordesc">
			<?php //echo $desc; ?>
		</p>
				-->