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



  jQuery(window).load(function() {
    jQuery('.large-flexslider').flexslider({
       animation: "slide"
    });

    jQuery('.flexslider-sidebar').flexslider({
       animation: "slide",
       controlNav: "false",
       directionNav: "false"
    });
  });



});