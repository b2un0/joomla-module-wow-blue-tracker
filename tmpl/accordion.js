window.wow = window.wow || {};

window.wow.mod_wow_blue_tracker = function () {
    jQuery('.mod_wow_blue_tracker h4').click(function () {
        if (jQuery(this).next('p').is(':visible')) {
            jQuery(this).next('p').slideUp('slow');
        } else {
            jQuery('.mod_wow_blue_tracker p').slideUp('slow');
            jQuery(this).next('p').slideToggle('slow');
        }
    });
}

if (typeof jQuery != 'undefined') {
    jQuery(document).ready(window.wow.mod_wow_blue_tracker);
}