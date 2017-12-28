<?php
session_start();
if(isset($_SESSION['username'])&&isset($_SESSION['id'])){
	//logged in
	$servername = "localhost";
	$username = "leminhye_user";
	$password = "1Q2S3C";
	$dbname = "leminhye_data";

	$vfname = "";
	$vmname = "";
	$vlname = "";
	$vgender = "";
	$vdate = "";
	$abt = "";
	$vphone = "";
	$vweb = "";
	$vemail = "";
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
}
else{
	header('Location: login.php');
}
include 'includes/header.php'; 
?>
<script type= "text/javascript" src = "scripts/countries2.js"></script>
<div class="testshowcard" id="main"></div> <!-- HEADER SHOWCARD. MINIMUM SIZE-50PX; ONLY CHANGE THE CLASS, NOT THE ID-->
<!--BEGIN PAGE CODE -->

<div class="fscc">
	<div class="sgcontentleft">
		<div class="sgbutton tablink" id="sgprof" onclick="openSet(event,'Profile')">Profile information</div>
		<div class="sgbutton tablink" id="sgsec" onclick="openSet(event,'Security')">Security</div>
		<div class="sgbutton tablink">Classes</div>
	</div>
	<div class="sgcontentright">
	  <div id="Profile" class="set">
	  	<div class="titlestripe">Profile settings</div>
	  		<div class="sgbasepad">
	  			<div class="clsubdiv">Personal Information:</div>
		  			<div style="padding-bottom:10px;">
					  	<!-- DRAW TABLES -->
					  	<?php 
					  	$tutorid = $_SESSION['id'];
					  	$sql = "SELECT first_name, last_name, middle_name, gender, birth_date, about_you, phone, website, email, country_residence, adr_line, school, degree, s_year_from, s_year_to, company, position, w_year_from, w_year_to FROM tbl_tutors WHERE id = '$tutorid'";
						$result = $conn->query($sql);
						print "<form action='' method='POST'>";
						if ($result->num_rows > 0) {
						    // output data of each row
						    while($row = $result->fetch_assoc()) {
						    	$vfname = $row["first_name"];
						    	$vmname = $row["middle_name"];
						    	$vlname = $row["last_name"];
						    	$vgender = $row["gender"];
						    	$vdate = $row["birth_date"];
						    	$abt = $row["about_you"];
						    	$vphone = $row["phone"];
						    	$vweb = $row["website"];
						    	$vemail = $row["email"];
						    	$vcountry = $row["country_residence"];
						    	$vadr = $row["adr_line"];
						    	$vsch = $row["school"];
						    	$vdegree = $row["degree"];
						    	$vtfrom = $row["s_year_from"];
						    	$vtto = $row["s_year_to"];
						    	$vcomp = $row["company"];
						    	$vpos = $row["position"];
						    	$vwfrom = $row["w_year_from"];
						    	$vwto = $row["w_year_to"];
						        //echo "id: " . $row["id"]. "<br>";
						        //echo "<input type='text' value='" .$row["id"]. "' />";
						    }
						} else {
						    echo "0 results";
						}
						print "<label for='fname' class='sglabel'>First Name</label>";
						print "<input type='text' name='fname' value='".$vfname."' placeholder='".$vfname."' id='sgfname' class='sginput' />";
						print "<label for='mname' class='sglabel'>Middle Name</label>";
						print "<input type='text' name='mname' value='".$vmname."' placeholder='".$vmname."' id='sgmname' class='sginput' />";
						print "<label for='lname' class='sglabel'>Last Name</label>";
						print "<input type='text' name='lname' value='".$vlname."' placeholder='".$vlname."' id='sglname' class='sginput' />";
						//nextline
						print "<label for='tgender' class='sglabel'>Gender</label>";
						print "<select name='tgender' id='sgtgender' class='sgselect'>";
							if($vgender == "m"){
								print "<option value='m' selected>Male</option>";
								print "<option value='f'>Female</option>";
							}
							else{
								print "<option value='m'>Male</option>";
								print "<option value='f' selected>Female</option>";
							}
						print "</select>";
						print "<label for='tbdate' class='sglabel'>Birth Date</label>";
						print "<input type='date' name='tbdate' class='sginput' value='".$vdate."' placeholder='".$vdate."' id='tbdate' />";
						print "<div style='clear:both;'></div>";
						//about yourself
						print "<label for='taboutys' class='sgclear'>About Yourself</label>";
						print "<textarea class='sgtxtnr' name='taboutys' id='taboutys' placeholder='" . $abt ."'>" . $abt . "</textarea>";
					  	?>
					  	<div style="clear:both;"></div>
				  	</div>
	  			<div class="clsubdiv">Contact Information:</div>
		  			<div style="padding-bottom:10px;">
		  				<?php
		  				//get country
  						print "<input type='hidden' id='hidecount' name='seccountry' value='" . $vcountry . "'>";
						print "<label for='sgemail' class='sglabel2'>Email</label>";
						print "<input type='text' name='sgemail' value='".$vemail."' placeholder='".$vemail."' id='sgemail' class='sginput2' />";
						print "<label for='sgphone' class='sglabel2'>Phone</label>";
						print "<input type='text' name='sgphone' value='".$vphone."' placeholder='".$vphone."' id='sgphone' class='sginput2' />";
						print "<label for='sgwebsite' class='sglabel2'>Website</label>";
						print "<input type='text' name='sgwebsite' value='".$vweb."' placeholder='".$vweb."' id='sgwebsite' class='sginput2' />";
						//nextline
						//country add country select list
						print "<span id='testspan'>";
						print "<label for='sgcountry' class='sglabel'>Country</label>";
						print "<select name='sgcountry' id='sgcountry' class='sgselect'>";
						print "</select>";
						print "</span>";
						print "<label for='vadr' class='sgclear'>Address line</label>";
						print "<input type='text' name='sgadr' value='".$vadr."' placeholder='".$vadr."' id='sgadr' class='sglonginput' />";

		  				?>
					  	<div style="clear:both;"></div>
				  	</div>
	  			<div class="clsubdiv">Education and Employment:</div>
		  			<div style="padding-bottom:10px;">
		  				<?php
						print "<label for='sgsch' style='width:153px !important;' class='sgclear'>School/University</label>";
						print "<input type='text' name='sgsch' value='".$vsch."' placeholder='".$vsch."' id='sgsch' class='sginput3' />";
						print "<label for='sgdegree' style='width:153px !important;' class='sgclear'>Degree/Diploma</label>";
						print "<input type='text' name='sgdegree' value='".$vdegree."' placeholder='".$vdegree."' id='sgdegree' class='sginput3' />";
						print "<label for='tfrom' class='sglabel'>From</label>";
						print "<input type='text' name='tfrom' class='sginput' value='".$vtfrom."' placeholder='".$vtfrom."' id='tfrom' />";
						print "<label for='tto' class='sglabel'>To</label>";
						print "<input type='text' name='tto' class='sginput' value='".$vtto."' placeholder='".$vtto."' id='tto' />";
						print "<div style='clear:both;'></div>";
						//////////////////////////////////////////
						print "<label for='sgcomp' style='width:153px !important;' class='sgclear'>Company</label>";
						print "<input type='text' name='sgcomp' value='".$vcomp."' placeholder='".$vcomp."' id='sgcomp' class='sginput3' />";
						print "<label for='sgpos' style='width:153px !important;' class='sgclear'>Position</label>";
						print "<input type='text' name='sgpos' value='".$vpos."' placeholder='".$vpos."' id='sgpos' class='sginput3' />";
						print "<label for='wfrom' class='sglabel'>From</label>";
						print "<input type='text' name='wfrom' class='sginput' value='".$vwfrom."' placeholder='".$vwfrom."' id='wfrom' />";
						print "<label for='wto' class='sglabel'>To</label>";
						print "<input type='text' name='wto' class='sginput' value='".$vwto."' placeholder='".$vwto."' id='wto' />";
		  				?>
					  	<div style="clear:both;"></div>
				  	</div>
	  			<div class="clsubdiv" style="margin-top:5px;border-top:1px dashed #dedede;">
	  				<?php 
	  					//check what form is being submitted
  						print "<input type='hidden' id='checkpage' name='checkpage' value='0'>";
  						print "<input type='submit' value='Save changes' class='schanges'/>";
  						print "<input type='submit' value='Cancel' onclick='window.location = window.location.href.split('#'')[0];' class='schanges'/>";
	  					//END FORM
						print "</form>";
						?>
	  			</div>
		  	</div>
	  </div>
	  <div id="Security" class="set" style="display:none">
	  	<div class="titlestripe">Security settings</div>

	  		<div class="sgbasepad">
	  			<div class="clsubdiv">Change password:</div>
		  			<div style="padding-bottom:10px;">
					  	<!-- DRAW TABLES -->
					  	<?php 
					  	$tutorid = $_SESSION['id'];
					  	$sql = "SELECT password FROM tbl_tutors WHERE id = '$tutorid'";
						$result = $conn->query($sql);
						print "<form action='' method='POST'>";
						if ($result->num_rows > 0) {
						    // output data of each row
						    while($row = $result->fetch_assoc()) {
						    	$vpass = $row["password"];
						    }
						} else {
						    echo "0 results";
						}
						print "<label for='cpass' class='sglabel'>Current</label>";
						print "<input type='text' name='cpass' value=' ' placeholder=' ' id='sgcpass' class='sginput' />";
						print "<label for='npass' class='sglabel'>New</label>";
						print "<input type='text' name='npass' value=' ' placeholder=' ' id='sgnpass' class='sginput' />";
						print "<label for='cfpass' class='sglabel'>Confirm</label>";
						print "<input type='text' name='cfpass' value=' ' placeholder=' ' id='sgcfpass' class='sginput' />";
						//END FORM
						print "</form>";
					  	?>
					  	<div style="clear:both;"></div>
				  	</div>
	  		</div>
	  </div>
	</div>
	<div style="clear:both;"></div>
</div>
<!-- TABBED CONTENT SCRIPT -->
<script>
//add the countries
populateCountries("sgcountry", "")
function openSet(evt, setName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("set");
  for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
      //tablinks[i].className = tablinks[i].className.replace(" stactive", "");
  }
  document.getElementById(setName).style.display = "block";
  //evt.currentTarget.className += " stactive";
}
</script>
<!-- Country Script -->
<script type="text/javascript">
	var test = $('#hidecount').val();
	if(test == "thai"){
		$('#testspan select option[value="' + "Thailand" + '"]').prop('selected',true);
	}
	else{
		$('#testspan select option[value="' + test + '"]').prop('selected',true);
	}
</script>
<!--END PAGE CODE -->
<script src="scripts/headerbg.js"></script> <!-- JQUERY HEADER BACKGROUND. DO NOT REMOVE!-->
<?php $conn->close();
include 'includes/footer.php';?>