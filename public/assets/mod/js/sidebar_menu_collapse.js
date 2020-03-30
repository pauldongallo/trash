$(document).ready(function(){
	$('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');

        if( $(".collapse_menu:visible").length){
        	$('.collapse_menu').hide();
        	$('.fas').removeClass('fa-align-left');
        	$('.fas').addClass('fa-chevron-circle-right');

        	// side bar custom icon
        	$("#sidebar .icon_image_holder").removeClass("float-left");
        	$(".icon_image_holder").css({"max-width":"50%"});
        	$(".side_bar_text").css({"padding-left":"0px", "padding-top":"10px"});

        	// logo
        	$("#sidebar .sidebar-header .mod-logo-collapse").show();
        	$("#sidebar .sidebar-header .mod-logo-default").hide();

             $(".admin_settings").hide();
            $(".admin_settings_icon").show();

    	} else {
    		$('.collapse_menu').show();
    		$('.fas').removeClass('fa-chevron-circle-right');
        	$('.fas').addClass('fa-align-left');

        	// side bar icon
        	$("#sidebar .icon_image_holder").addClass("float-left");
        	$(".icon_image_holder").css({"max-width":"9%"});
        	$(".side_bar_text").css({"padding-left":"50px", "padding-top":"0px"});

        	// logo
        	$("#sidebar .sidebar-header .mod-logo-collapse").hide();
        	$("#sidebar .sidebar-header .mod-logo-default").show();

            $(".admin_settings").show();
            $(".admin_settings_icon").hide();

    	}
        
    });
});