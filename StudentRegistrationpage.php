<?php include 'includes/header.php'; ?>
<script type= "text/javascript" src = "countries.js"></script>
<div class="showcardveil2"></div>
<div class="showcard3" id="main">
	
	<div class="showcasetext2">
		<h1 class="showcaseh12">Register as a student</h1>
		<hr class="testline" width="60%">
		<p class="showcasep">Find your perfect tutor</p>
	</div>
</div>
<form enctype="multipart/form-data" action="store.php" method="post">
<div class="content2">
		<div class="registertitle2" style="background-color:#B3C100;">
			<div class="linepad">
				Registered tutors: 
				<?php 
				$con=mysqli_connect("localhost","leminhye_user","1Q2S3C","leminhye_data");
				// Check connection
				if (mysqli_connect_errno())
				  {
				  echo "Failed to connect to MySQL: " . mysqli_connect_error();
				  }

				$sql="SELECT email FROM tbl_tutors ORDER BY id";

				if ($result=mysqli_query($con,$sql))
				  {
				  // Return the number of rows in result set
				  $rowcount=mysqli_num_rows($result);
				  echo $rowcount;
				  // Free result set
				  mysqli_free_result($result);
				  }

				mysqli_close($con);
?>
			</div>
			<div class="linepad">
				Registered students: number goes here
				<?php ?>
			</div>
			<div style="clear:both"></div>
		</div>
		<div class="registertitle">Personal information</div>
		<div class="contpad">
			<div class="formcontainer">
				<div class="ffl">
					<div class="fieldcont">
						<div class="textfieldcont">First name:
						<div class="tooltip">*
						  <span class="tooltiptext">Required</span>
						</div>
	         			</div>
						<input class="fieldcontin" id="frname" type="text" name="fname" required>
						<div style="clear:both"></div>
					</div>
					<div class="fieldcont">
						<div class="textfieldcont">Middle name:</div>
						<input class="fieldcontin" type="text" name="mname">
						<div style="clear:both"></div>
					</div>
					<div class="fieldcont">
						<div class="textfieldcont">Last name:
						<div class="tooltip">*
						  <span class="tooltiptext">Required</span>
						</div>
						</div>
						<input class="fieldcontin" id="lrname" type="text" name="lname" required>
						<div style="clear:both"></div>
					</div>
					<div class="fieldcont">
						<div class="textfieldcont">Gender:
						<div class="tooltip">*
						  <span class="tooltiptext">Required</span>
						</div>
						</div>
						<input type="radio" class="rad" value="m" id="male" name="genderrad" required><label onclick="labelsel(this)" id="fmale" for="male" class="radtext">Male</label>
						<input type="radio" class="rad" value="f" id="female" name="genderrad" required><label onclick="labelsel(this)" id="ffemale" for="female" class="radtext2">Female</label>
						<div style="clear:both"></div>
					</div>
					<div class="fieldcont">
						<div class="textfieldcont">Date of birth:
						<div class="tooltip">*
						  <span class="tooltiptext">Required</span>
						</div>
						</div>
						<select class="fieldcontsel" id="dayselc" name="dobday" required>
							<option>Day</option>
							<option value="01">1</option>
							<option value="02">2</option>
							<option value="03">3</option>
							<option value="04">4</option>
							<option value="05">5</option>
							<option value="06">6</option>
							<option value="07">7</option>
							<option value="08">8</option>
							<option value="09">9</option>
							<option value="10">10</option>
							<option value="11">11</option>
							<option value="12">12</option>
							<option value="13">13</option>
							<option value="14">14</option>
							<option value="15">15</option>
							<option value="16">16</option>
							<option value="17">17</option>
							<option value="18">18</option>
							<option value="19">19</option>
							<option value="20">20</option>
							<option value="21">21</option>
							<option value="22">22</option>
							<option value="23">23</option>
							<option value="24">24</option>
							<option value="25">25</option>
							<option value="26">26</option>
							<option value="27">27</option>
							<option value="28">28</option>
							<option value="29">29</option>
							<option value="30">30</option>
							<option value="31">31</option>
						</select>
						<select class="fieldcontsel" id="monthselc" name="dobmonth" required>
							<option>Month</option>
							<option value="01">January</option>
							<option value="02">February</option>
							<option value="03">March</option>
							<option value="04">April</option>
							<option value="05">May</option>
							<option value="06">June</option>
							<option value="07">July</option>
							<option value="08">August</option>
							<option value="09">September</option>
							<option value="10">October</option>
							<option value="11">November</option>
							<option value="12">December</option>
						</select>
						<select class="fieldcontsel" id="yearsdob" name="dobyear" required>
						</select>
						<div style="clear:both"></div>
					</div>
					<div class="fieldcont">
						<div class="textfieldcont">Nationality:
						<div class="tooltip">*
						  <span class="tooltiptext">Required</span>
						</div>
						</div>
						<input type="radio" class="rad" value="thai" id="thai" name="thaination"><label onclick="labelsel(this)" id="rthai" for="thai" class="radtext">Thai</label>
						<select class="fieldcontsel" id="countrysel" onclick="labelsel(this)" name="othernation">
						</select>
					</div>
				</div>
				<div class="ffr">
					<div class="imagepr" id="imgprev"></div>
					<input id="file" class="imagesubi" name="file" type="file"  required onchange="loadFile(event)"/>
					
				</div>
				<div style="clear:both"></div>
			</div>
			
		</div>
		<div class="registertitle">Contact information</div>
		<div class="contpad">
			<div class="formcontainer">
				<div class="fieldcont">
					<div class="textfieldconte">E-mail:
						<div class="tooltip">*
						  <span class="tooltiptext">Required</span>
						</div>
						</div>
					<input type="email" class="fieldcontin2" name="email" required>
					<div style="clear:both"></div>
				</div>
				<div class="fieldcont">
					<div class="textfieldconte">Phone number:</div>
					<input type="tel" class="fieldcontin2" class="phoneinp" name="phoneno">
					<div style="clear:both"></div>
				</div>
			</div>
		</div>
		<div class="registertitle">Education</div>
		<div class="contpad">
			<div class="formcontainer">
				<div class="fieldcont">
					<div class="textfieldconte">School/University:
						
						</div>
					<input type="" class="fieldcontin2" name="school" required>
					<div style="clear:both"></div>
				</div>
				
			</div>
		</div>
		<div class="registertitle">Employment</div>
		<div class="contpad">
			<div class="formcontainer">
				<div class="fieldcont">
					<div class="textfieldconte">Company:</div>
					<input type="" class="fieldcontin2" name="company">
					<div style="clear:both"></div>
				</div>
				
			</div>
		</div>
		<div class="tocdiv">
		<div class="regcaptcha">
			 <div class="g-recaptcha" data-sitekey="6LeGvREUAAAAAInLy7e1qlN-dBjruX37BoLqqPkk" data-callback="enableBtn"></div>
		</div>
		<div class="contpad">
			<input type="checkbox" name="tocbox" class="tocbox" id="tocbox" required><label class="toclabel" for="tocbox">I agree to the Terms and Conditions.</label>
			<input id="submitbutt" type="submit" name="submit" value="submit" class="subformb" disabled>
			<div style="clear:both"></div>
		</div>
		</div>

</div>
</form>
<script type="text/javascript">
	//FORM VALIDATION
	function enableBtn(){
    		document.getElementById("submitbutt").disabled = false;

   }


</script>
<script type="text/javascript">
					  var loadFile = function(event) {
					    var reader = new FileReader();
					    reader.onload = function(){
					      document.getElementById("imgprev").style.backgroundImage = "url(" + reader.result + ")";
					    };
					    reader.readAsDataURL(event.target.files[0]);
					  };
					</script>
<script type="text/javascript">
	
function labelsel(obj){
	if (obj.id == "fmale") {
		document.getElementById("ffemale").style.backgroundImage = 'none';
		obj.style.backgroundImage = "url('../images/check.png')";
	}
	else if (obj.id == "ffemale") {
		document.getElementById("fmale").style.backgroundImage = 'none';
		obj.style.backgroundImage = "url('../images/check.png')";
	}
	else if (obj.id == "rthai") {
		obj.style.backgroundImage = "url('../images/check.png')";
		document.getElementById("countrysel").options[0].selected = true; //resets to select your country		
	}																	  //to avoid user confusion
	else if (obj.id == "countrysel") {
		document.getElementById("rthai").style.backgroundImage = 'none';
		document.getElementById("thai").checked = false; //sets radio to false
	}
}


</script>
		
<script src="scripts/regformauto.js"></script>
<script src="scripts/headerbg.js"></script> <!-- JQUERY HEADER BACKGROUND. DO NOT REMOVE!-->
<script type="text/javascript">

//get the years
var end = 1940;
var start = new Date().getFullYear();
var options = "<option>Year</option><option value='present'>Present</option>";
//var doboptions = "<option>Year</option>"
for(var year = start; year >=end; year--){
  options += "<option value="+ year +">"+ year +"</option>";
  //doboptions += "<option value="+ year +">"+ year +"</option>";
}
document.getElementById("yearsstudy").innerHTML = options;
document.getElementById("yearsstudy2").innerHTML = options;
document.getElementById("yearswork").innerHTML = options;
document.getElementById("yearswork2").innerHTML = options;
//document.getElementById("yearsdob").innerHTML = doboptions;


console.log(options);

//add the countries
populateCountries("countrysel", "")
</script>
<?php include 'includes/footer.php'; ?>