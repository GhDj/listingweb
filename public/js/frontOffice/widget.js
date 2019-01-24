/* =========================================================
Tabs
============================================================ */
(function ($) {

	if( $(".tab-content-1").length > 0){
        //Default Action Product Tab
        $(".tab-content-1").hide(); //Hide all content
        $("ul.tabs-1 li:first").addClass("active").show(); //Activate first tab
        $(".tab-content-1:first").show(); //Show first tab content
        //On Click Event Product Tab
        $("ul.tabs-1 li").click(function(e) {

						e.preventDefault();
            $("ul.tabs-1 li").removeClass("active"); //Remove any "active" class
            $(this).addClass("active"); //Add "active" class to selected tab
            $(".tab-content-1").hide(); //Hide all tab content
            var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
            $(activeTab).fadeIn(); //Fade in the active content
            return false;

        });
    }

	if( $(".tab-content-2").length > 0){
        //Default Action Product Tab
        $(".tab-content-2").hide(); //Hide all content
        $("ul.tabs-2 li:first").addClass("active").show(); //Activate first tab
        $(".tab-content-2:first").show(); //Show first tab content
        //On Click Event Product Tab
        $("ul.tabs-2 li").click(function() {
            $("ul.tabs-2 li").removeClass("active"); //Remove any "active" class
            $(this).addClass("active"); //Add "active" class to selected tab
            $(".tab-content-2").hide(); //Hide all tab content
            var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
            $(activeTab).fadeIn(); //Fade in the active content
            return false;

        });
    }

	if( $(".tab-content-3").length > 0){
        //Default Action Product Tab
        $(".tab-content-3").hide(); //Hide all content
        $("ul.tabs-3 li:first").addClass("active").show(); //Activate first tab
        $(".tab-content-3:first").show(); //Show first tab content
        //On Click Event Product Tab
        $("ul.tabs-3 li").click(function() {
            $("ul.tabs-3 li").removeClass("active"); //Remove any "active" class
            $(this).addClass("active"); //Add "active" class to selected tab
            $(".tab-content-3").hide(); //Hide all tab content
            var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
            $(activeTab).fadeIn(); //Fade in the active content
            return false;

        });
    }

});
