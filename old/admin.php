<?php
if(!isset($_SESSION))
{
    session_start();
}
if(!isset($_SESSION['username'])){
   header("Location: login.php");
}
include 'includes/header.php'; 
?>
<div class="testshowcard" id="main"></div>
<div class="admincontent">
	<div class="adminsidebar">
     <ul class="sidebarul">
         <li class="sidebarli"><a href="javascript:void(0)" onclick="openPage(event, 'Profile')" class="sidebara" id="profile">Profile</a></li>
         <li class="sidebarli"><a href="javascript:void(0)" onclick="openPage(event, 'Settings')" class="sidebara" id="settings">Settings</a></li>
         <li class="sidebarli"><a href="javascript:void(0)" onclick="openPage(event, 'Tokyo')" class="sidebara">Test3</a></li>
     </ul>   
    </div>
	<div class="admincontentinner">
        <div id="Profile" class="tabcontent">
          <h3>Profile settings</h3>
          <p>Do something here.</p>
        </div>

        <div id="Settings" class="tabcontent">
          <h3>Paris</h3>
          <p>Paris is the capital of France.</p>
        </div>

        <div id="Tokyo" class="tabcontent">
          <h3>Tokyo</h3>
          <p>Tokyo is the capital of Japan.</p>
        </div>
    </div>
</div>

<script type="text/javascript">
    function openPage(evt, pageName) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the link that opened the tab
    document.getElementById(pageName).style.display = "block";
    evt.currentTarget.className += " active";
}

</script>




<script type="text/javascript">
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
	</script>
<?php include 'includes/footer.php';?>