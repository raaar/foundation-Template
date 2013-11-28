jQuery( document ).ready(function($) {

	$('.btn-navbar-search , .navbar-search-close').click(function () {
		console.log('hello');
		$('.navbar-search').toggle();
	});

	$('.off-canvas-lightbox').click(function () {
		$('.off-canvas').removeClass('active');
		$(this).hide();
	})

	//enabe :active Safari Mobile
	//document.addEventListener("touchstart", function(){}, true);



	//Simple accordion CSS tricks   
	var allPanels = $('.list-accordion > dd, .academy-accordion > dd').hide();
	    
	$('.list-accordion > dt, .list-accordion .close-arrow, .academy-accordion > dt, .academy-accordion .close-arrow').click(function() {
	    allPanels.hide();
	    $(".open-arrow").show();
	    $(this).next().show();

	    $(this).find(".open-arrow").hide();
	    return false;
	});



    jQuery('.large-flexslider').flexslider({
       animation: "slide"
      	//prevText: "<a class='first arrow-right'><i class='fa fa-angle-right'></i><i class='fa fa-angle-right angle-right-overlay'></i></a>",           //String: Set the text for the "previous" directionNav item
		//nextText: "<img class='nav-arrow' src='/wp-content/themes/foundation-inside/img/arrow-right.png' />"
    });

    jQuery('.flexslider-sidebar').flexslider({
       animation: "slide",
       controlNav: "false",
       directionNav: "false"
    });

	jQuery(document).ready(function($) {
	    $("#buttonForModal").click(function() {
	    	$("#myModal1").reveal();
	    });
	});


	$('.activate-lightbox').click(function(){
		$('.lightbox').addClass("is-active");
	})
	$('.lightbox').click( function(){
		$(this).removeClass("is-active");
	});


});