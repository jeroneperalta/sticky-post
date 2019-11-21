jQuery(document).ready(function() {

    stickyTestimonial();
    placeholderText();

    jQuery(window).resize(function () {
        /*------------------------
         * initialize
         *------------------------
         */
        stickyTestimonial();
    });

    function stickyTestimonial() {
        var viewportWidth = jQuery(window).width();
        if (viewportWidth > 576) {
            jQuery( '.sticky-testimonial--accordion-button' ).removeClass( 'collapsed' );
            jQuery( '.sticky-testimonial--accordion-content' ).addClass( 'show' );
        } else {
            jQuery( '.sticky-testimonial--accordion-button' ).addClass( 'collapsed' );
            jQuery( '.sticky-testimonial--accordion-content' ).removeClass( 'show' );
        }
    }
    function placeholderText() {
        jQuery( '.placeholder-text-source' ).each(function() {
            var name = jQuery( this ).text();
            var getInitials = function (name) {
                var parts = name.split(' ')
                var initials = ''
                for (var i = 0; i < parts.length; i++) {
                    if (parts[i].length > 0 && parts[i] !== '') {
                    initials += parts[i][0]
                    }
                }
                return initials
            }
            jQuery( this ).parent().find( '.placeholder-text-value' ).text( getInitials(name) );
            console.log( getInitials(name) );
        });
    }
});