if (typeof jQuery != 'undefined') {
    jQuery(document).ready(function ($) {
        $('.mod_wow_blue_tracker h4').click(function () {
            if ($(this).next('p').is(':visible')) {
                $(this).next('p').slideUp('slow');
            } else {
                $('.mod_wow_blue_tracker p').slideUp('slow');
                $(this).next('p').slideToggle('slow');
            }
        });
    });
}