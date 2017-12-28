<?php include 'includes/header.php';?>

<div class="showcardveil"></div>
<div class="showcard" id="main">
	
	<div class="showcasetext">
		<h1 class="showcaseh1">Find a tutor thats right for you</h1>
		<hr class="testline" width="60%">
		<p class="showcasep">Pick from a selection of trusted and experienced members of the community</p>
	</div>
</div>
<div class="content">
	<div class="advancedsearch">
	<select id="type">
    <option value="item1">item1</option>
    <option value="item2">item2</option>
    <option value="item3">item3</option>
</select>

<select id="size">
    <option value="">-- select one -- </option>
</select>
	<!--
		<table>
			<tr>
				<td>
					 <select name="country">
					  <option value="thailand">Thailand</option>
					  <option value="states">United States</option>
					  <option value="ukraine">Ukraine</option>
					  <option value="japan">Japan</option>
					</select>
				</td>
			</tr>
			<tr>
				
			</tr>
		</table>
-->


	</div>

</div>
<script type="text/javascript">
	$(document).ready(function () {
    $("#type").change(function () {
        var val = $(this).val();
        if (val == "item1") {
            $("#size").html("<option value='test'>item1: test 1</option><option value='test2'>item1: test 2</option>");
        } else if (val == "item2") {
            $("#size").html("<option value='test'>item2: test 1</option><option value='test2'>item2: test 2</option>");
        } else if (val == "item3") {
            $("#size").html("<option value='test'>item3: test 1</option><option value='test2'>item3: test 2</option>");
        }
    });
});

	
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