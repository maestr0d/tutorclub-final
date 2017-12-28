<!---

Changes Made

0. Added html for the dropdown list
1. Added JS for the year and inserted them to HTML
2. Added JS for the countries and inserted them to HTML
3. added JS to labelsel, when radio is checked countrysel resets, and viceversa.
4. added a name for all of the form elements //if you want to change it to suite your style, just do it and let me know so later on i'll follow it.
5. changes value of 'male' to 'm' and 'female' to 'm'.
6. Removed Website because its not needed.   


///////////////////

Things to do with PHP

0) set country options [done]
1) Make sure form sumbit works
2) Create Database
3) Store it in the database
4) Make sure if the person is logged in he does not end up in the register page.

////////////////////

--->

<?php include 'includes/header.php'; ?>

<!-- For Arthur: I didn't want to fuss of changing to many pages so i added the head here,
 this is the js that has all the countries in it, its pretty useful even though its heavily packed -->
<head>
<script type= "text/javascript" src = "countries.js"></script>
</head>
<div class="showcardveil2"></div>
<div class="showcard3" id="main">
	
	<div class="showcasetext2">
		<h1 class="showcaseh12">Register as a tutor</h1>
		<hr class="testline" width="60%">
		<p class="showcasep">Get yourself discovered</p>
	</div>
</div>
<form enctype="multipart/form-data" action="store.php" method="post">
<div class="content2">
		<div class="registertitle2" style="background-color:#B3C100;">
			<div class="linepad">
				Registered tutors: echoregnum here
			</div>
			<div class="linepad">
				Registered students: echoregnum2 here
			</div>
			<div style="clear:both"></div>
		</div>
		<div class="registertitle">Personal information</div>
		<div class="contpad">
			<div class="formcontainer">
				<div class="ffl">
					<div class="fieldcont">
						<div class="textfieldcont">First name:
	         			</div>
						<input class="fieldcontin" type="text" name="fname">
						<div style="clear:both"></div>
					</div>
					<div class="fieldcont">
						<div class="textfieldcont">Middle name:</div>
						<input class="fieldcontin" type="text" name="mname">
						<div style="clear:both"></div>
					</div>
					<div class="fieldcont">
						<div class="textfieldcont">Last name:</div>
						<input class="fieldcontin" type="text" name="lname">
						<div style="clear:both"></div>
					</div>
					<div class="fieldcont">
						<div class="textfieldcont">Gender:</div>
						<input type="radio" class="rad" value="m" id="male" name="genderrad"><label onclick="labelsel(this)" id="fmale" for="male" class="radtext">Male</label>
						<input type="radio" class="rad" value="f" id="female" name="genderrad"><label onclick="labelsel(this)" id="ffemale" for="female" class="radtext2">Female</label>
						<div style="clear:both"></div>
					</div>
					<div class="fieldcont">
						<div class="textfieldcont">Date of birth:</div>
						<select class="fieldcontsel" id="dayselc" name="dobday">
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
						<select class="fieldcontsel" id="monthselc" name="dobmonth">
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
						<select class="fieldcontsel" id="yearsdob" name="dobyear">
						</select>
						<div style="clear:both"></div>
					</div>
					<div class="fieldcont">
						<div class="textfieldcont">Nationality:</div>
						<input type="radio" class="rad" value="thai" id="thai" name="thaination"><label onclick="labelsel(this)" id="rthai" for="thai" class="radtext">Thai</label>
						<select class="fieldcontsel" id="countrysel" onclick="labelsel(this)" name="othernation">
						</select>
					</div>
				</div>
				<div class="ffr">
					<div class="imagepr"></div>
				</div>
				<div style="clear:both"></div>
			</div>
			<div class="formcontainer">
				<div class="fieldcontl">
						<div class="textfieldcont" style="border-right:none;">About you:</div>
						<div class="taxholder">
							<textarea class="abouttext" name="aboutyou"></textarea>
						</div>
				</div>
			</div>
		</div>
		<div class="registertitle">Contact information</div>
		<div class="contpad">
			<div class="formcontainer">
				<div class="fieldcont">
					<div class="textfieldconte">E-mail:</div>
					<input type="" class="fieldcontin2" name="email">
					<div style="clear:both"></div>
				</div>
				<div class="fieldcont">
					<div class="textfieldconte">Phone number:</div>
					<input type="" class="fieldcontin2" class="phoneinp" name="phoneno">
					<div style="clear:both"></div>
				</div>
				<div class="fieldcontl">
					<div class="textfieldconte">Website:</div>
					<input type="" class="fieldcontin2" class="phoneinp" name="website">
					<div style="clear:both"></div>
				</div>
			</div>
		</div>
		<div class="registertitle">Education</div>
		<div class="contpad">
			<div class="formcontainer">
				<div class="fieldcont">
					<div class="textfieldconte">School/University:</div>
					<input type="" class="fieldcontin2" name="school">
					<div style="clear:both"></div>
				</div>
				<div class="fieldcont">
					<div class="textfieldconte">Degree:</div>
					<input type="" class="fieldcontin2" name="degree">
					<div style="clear:both"></div>
				</div>
				<div class="fieldcontl">
					<div class="textfieldconte">Years of study:</div>
					<select class="betweensel" id="yearsstudy" name="Syearfrom">						
					</select>
					<div class="radtextmin">to</div>
					<select class="betweensel2" id="yearsstudy2" name="Syearto">
						
					</select>
					<div style="clear:both"></div>
				</div>
			</div>
		</div>
		<div class="registertitle">Work experience</div>
		<div class="contpad">
			<div class="formcontainer">
				<div class="fieldcont">
					<div class="textfieldconte">Company:</div>
					<input type="" class="fieldcontin2" name="company">
					<div style="clear:both"></div>
				</div>
				<div class="fieldcont">
					<div class="textfieldconte">Position:</div>
					<input type="" class="fieldcontin2" name="position">
					<div style="clear:both"></div>
				</div>
				<div class="fieldcontl">
					<div class="textfieldconte">Years of employment:</div>
					<select class="betweensel" id="yearswork" name="Wyearform">
					</select>
					<div class="radtextmin">to</div>
					<select class="betweensel2" id="yearswork2" name="Wyearto">
					</select>
					<div style="clear:both"></div>
				</div>
			</div>
		</div>
		<div class="tocdiv">
		<div class="contpad">
			<input type="checkbox" name="tocbox" class="tocbox" id="tocbox"><label class="toclabel" for="tocbox">I agree to the Terms and Conditions.</label>
			<input type="submit" name="submit" value="submit" class="subformb">
			<div style="clear:both"></div>
		</div>
		</div>

</div>
</form>
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
<!-- Turned it off cause it was causing problems
		
<script src="scripts/regformauto.js"></script>-->
<script type="text/javascript">
/*
	Turned it off cause it was causing problems

// get the value of the bottom of the #main element by adding the offset of that element plus its height, set it as a variable
var mainbottom = $('#main').offset().top + $('#main').height();

// on scroll, 
$(window).on('scroll',function(){

    // we round here to reduce a little workload
    stop = Math.round($(window).scrollTop());
    if (stop > mainbottom) {
        $('.navtrans').css({"background":"rgba(39, 32, 28, 0.7)"});
    } else {
       $('.navtrans').css({"background":"transparent"});
    }

});
 
*/

//get the years
var end = 1940;
var start = new Date().getFullYear();
var options = "<option>Year</option><option value='present'>Present</option>";
var doboptions = "<option>Year</option>"
for(var year = start; year >=end; year--){
  options += "<option value="+ year +">"+ year +"</option>";
  doboptions += "<option value="+ year +">"+ year +"</option>";
}
document.getElementById("yearsstudy").innerHTML = options;
document.getElementById("yearsstudy2").innerHTML = options;
document.getElementById("yearswork").innerHTML = options;
document.getElementById("yearswork2").innerHTML = options;
document.getElementById("yearsdob").innerHTML = doboptions;


console.log(options);

//add the countries
populateCountries("countrysel", "")
</script>
<script type="text/javascript"></script>