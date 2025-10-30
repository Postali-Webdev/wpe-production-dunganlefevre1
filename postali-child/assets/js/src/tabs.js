jQuery( function ( $ ) {
	"use strict";

	$(".tab_content").hide();
    $(".tab1").show();

    /* if in tab mode */
    $("ul.tabs li").click(function() {
        $(".tab_content").hide();
        var activeTab = $(this).attr("rel"); 
        $("."+activeTab).fadeIn();		
            
        $("ul.tabs li").removeClass("active");
        $(this).addClass("active");
    });
});

