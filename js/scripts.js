$(document).ready(function () {
	$("#aa").click(function(){
    $("#exCollapsingNavbar1").toggle(400);
	});

	$(".bb").click(function(){
    $("#exCollapsingNavbar2").toggle(400);
	});

	$('#map-poland').cssMap({
		    'size': 660,        // set map size to 660px wide;
		    'tooltips': false,  // hide tooltips;
		    'cities': true      // display cities;
   		});
	
	if($(window).width() < 1024){
		$('#map-poland').cssMap({
		    'size': 500,
		    'tooltips': false,  // hide tooltips;
		    'cities': true      // display cities;
   		});
	}

	if($(window).width() < 540){
		$('#map-poland').css('display', 'none');
	}


});
