window.wow = window.wow || {};

window.wow.mod_wow_blue_tracker = function () {
    jQuery('.mod_wow_blue_tracker .header').click(function (e) {
        e.preventDefault();
        if (jQuery(this).next('div').is(':visible')) {
            jQuery(this).next('div').slideUp('slow');
        } else {
            jQuery(this).parent().parent().find('div').slideUp('slow');
            jQuery(this).next('div').slideToggle('slow');
        }
    });
}

if (typeof jQuery != 'undefined') {
    jQuery(document).ready(window.wow.mod_wow_blue_tracker);
}