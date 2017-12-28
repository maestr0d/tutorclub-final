
							$(document).ready(function () {
						    $("#monthsel").change(function () {
						        var val = $(this).val();
						        var i = 1;
						        if (val == "1" || val == "3" || val == "5" || val == "7" || val == "8" || val == "10" || val == "12") {
									$('#daysel')
									    .empty()
									    .append('<option value="" disabled selected>Day</option>')
									;
						        	while(i < 32) {
						            	//$("#daysel").html("<option value='" + i + "'>" + i + "</option>");
						            	$('#daysel').append($('<option>', {
										    value: i,
										    text: i
										}));
						            	i++;
						        	}
						        } else if (val == "2") {
									$('#daysel')
									    .empty()
									    .append('<option value="" disabled selected>Day</option>')
									;
						        	while(i < 29) {
						            	//$("#daysel").html("<option value='" + i + "'>" + i + "</option>");
						            	$('#daysel').append($('<option>', {
										    value: i,
										    text: i
										}));
						            	i++;
						        	}
						        } else if (val == "4" || val == "6" || val == "9" || val == "11") {
									$('#daysel')
									    .empty()
									    .append('<option value="" disabled selected>Day</option>')
									;
						        	while(i < 31) {
						            	//$("#daysel").html("<option value='" + i + "'>" + i + "</option>");
						            	$('#daysel').append($('<option>', {
										    value: i,
										    text: i
										}));
						            	i++;
						        	}
						        }
						    });
						});

							/////////////////


	    var select = document.getElementById("yearsdob");
	    var option = document.createElement("option");
	    var option2 = document.createElement("option");
	    var d = new Date();
		var n = d.getFullYear(); 
	    var curr = n - 18;
	    var j = 0;
	    	var opt2 = document.createElement('option');
		    opt2.value =  "Year";
		    opt2.innerHTML =  "Year";
		    select.appendChild(opt2);
	    while(j  < 72) {
	    	var opt = document.createElement('option');
		    opt.value =  curr - j;
		    opt.innerHTML =  curr - j;
		    select.appendChild(opt);
	    	j++;
	    }