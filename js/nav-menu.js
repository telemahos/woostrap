
( function( $ ) {
   $(window).scroll(function() {
     if (document.documentElement.clientWidth > 960) {
       // console.log("960 width");
       // $("ul#menu-primary-navigation").addClass('pull-left');
       if ($(document).scrollTop() > 100) {
         $('nav').addClass('navbar-fixed-top');
         $('nav').addClass('stick-to-top');
         $('.navbar-default').css( "background", "#ffffff" );
         $('#navbar').css( "box-shadow", "0px -10px 0px 0px rgba(255, 255, 255, 0.2)" );
         $('.navbar-default').css("box-shadow", "5px 9px 11px 0px rgba(26, 24, 28, 0.14)" );
         $('.navbar-default').css("-webkit-box-shadow", "5px 9px 11px 0px rgba(26, 24, 28, 0.14)" );
         $('.navbar-default').css("-moz-box-shadow", "5px 9px 11px 0px rgba(26, 24, 28, 0.14)" );
         $('.ufold h1').css( "margin-top", "200px" );
       } else {
         $('nav').removeClass('navbar-fixed-top');
         $('nav').removeClass('stick-to-top');
         $('.navbar-default').css( "background", "transparent" );
         $('#navbar').css( "box-shadow", "0px -10px 0px 0px rgba(255, 255, 255, 0.2)" );
         $('.navbar-default').css("-webkit-box-shadow", "none" );
         $('.navbar-default').css("-moz-box-shadow", "none" );
         $('.navbar-default').css("box-shadow", "none" );
         $('.ufold h1').css( "margin-top", "100px" );
       }
     }
     // else {
         // $("ul#menu-primary-navigation").removeClass('pull-left');
       // console.log("no width");
     // }
   });
} )(jQuery);