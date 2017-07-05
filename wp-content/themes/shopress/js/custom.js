(function($) {
  "use strict";
//------------------------------------------
    //slider
//------------------------------------------
jQuery(document).ready(function() {
  jQuery("#shopress-slider").owlCarousel({
      navigation : true, // Show next and prev buttons
      slideSpeed : 200,
      pagination : true,
      paginationSpeed : 400,
      singleItem:true,
      video:true,
      autoPlay : true,
      transitionStyle : "backSlide",
      navigationText: [
      "<i class='fa fa-angle-left'></i>",
      "<i class='fa fa-angle-right'></i>"
      ]
});
//------------------------------------------
    //scroll-top
//------------------------------------------
  jQuery(".shopress_scroll").hide();   
    jQuery(function () {
        jQuery(window).scroll(function () {
            if ($(this).scrollTop() > 500) {
                $('.shopress_scroll').fadeIn();
            } else {
                $('.shopress_scroll').fadeOut();
            }
        });     
        jQuery('a.shopress_scroll').click(function () {
            jQuery('body,html').animate({
                scrollTop: 0
            }, 800);
            return false;
        });
    });  
//------------------------------------------
    //menu hover
//------------------------------------------


});
})(jQuery);
  