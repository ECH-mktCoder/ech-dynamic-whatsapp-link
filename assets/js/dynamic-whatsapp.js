jQuery(document).ready(function(){
    var selector = jQuery("#dynamic_wtsapp_info").data("selector");
    var wtsapp_link = jQuery("#dynamic_wtsapp_info").data("wtsapp-link");

    jQuery(selector).attr("href", wtsapp_link);
});