/* =========================================================
Tabs
============================================================ */
jQuery(document).ready(function() {

	if( jQuery(".tab-content-1").length > 0){
        //Default Action Product Tab
        jQuery(".tab-content-1").hide(); //Hide all content
        jQuery("ul.tabs-1 li:first").addClass("active").show(); //Activate first tab
        jQuery(".tab-content-1:first").show(); //Show first tab content
        //On Click Event Product Tab
        jQuery("ul.tabs-1 li").click(function() {
            jQuery("ul.tabs-1 li").removeClass("active"); //Remove any "active" class
            jQuery(this).addClass("active"); //Add "active" class to selected tab
            jQuery(".tab-content-1").hide(); //Hide all tab content
            var activeTab = jQuery(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
            jQuery(activeTab).fadeIn(); //Fade in the active content
            return false;

        });
    }

	if( jQuery(".tab-content-2").length > 0){
        //Default Action Product Tab
        jQuery(".tab-content-2").hide(); //Hide all content
        jQuery("ul.tabs-2 li:first").addClass("active").show(); //Activate first tab
        jQuery(".tab-content-2:first").show(); //Show first tab content
        //On Click Event Product Tab
        jQuery("ul.tabs-2 li").click(function() {
            jQuery("ul.tabs-2 li").removeClass("active"); //Remove any "active" class
            jQuery(this).addClass("active"); //Add "active" class to selected tab
            jQuery(".tab-content-2").hide(); //Hide all tab content
            var activeTab = jQuery(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
            jQuery(activeTab).fadeIn(); //Fade in the active content
            return false;

        });
    }

	if( jQuery(".tab-content-3").length > 0){
        //Default Action Product Tab
        jQuery(".tab-content-3").hide(); //Hide all content
        jQuery("ul.tabs-3 li:first").addClass("active").show(); //Activate first tab
        jQuery(".tab-content-3:first").show(); //Show first tab content
        //On Click Event Product Tab
        jQuery("ul.tabs-3 li").click(function() {
            jQuery("ul.tabs-3 li").removeClass("active"); //Remove any "active" class
            jQuery(this).addClass("active"); //Add "active" class to selected tab
            jQuery(".tab-content-3").hide(); //Hide all tab content
            var activeTab = jQuery(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
            jQuery(activeTab).fadeIn(); //Fade in the active content
            return false;

        });
    }

});
