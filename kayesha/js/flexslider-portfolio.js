jQuery(document).ready(function($){ 	//no conflict wrapper
		//testing slider with thumbnail controlnav
	  // Can also be used with $(document).ready() 
			// $(window).load(function() {
			//   $('.slider-portfolio').flexslider({
			//     animation: "slide",
			//     controlNav: "thumbnails"
			//   });
			// });


	// The slider being synced must be initialized first
  $('#carousel').flexslider({
    animation: "slide",
    controlNav: false,
    animationLoop: false,
    slideshow: false,
    itemWidth: 210,
    itemMargin: -10,
    asNavFor: '#slider'
  });
 
  $('#slider').flexslider({
    animation: "slide",
    controlNav: false,
    animationLoop: false,
    slideshow: false,
    sync: "#carousel"
  });


	 });
