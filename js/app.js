jQuery(document).ready(function() {

    stickyPost();
    placeholderText();

    jQuery(window).resize(function () {
        /*------------------------
         * initialize
         *------------------------
         */
        stickyPost();
    });

    function stickyPost() {
        var viewportWidth = jQuery(window).width();
        if (viewportWidth > 576) {
            jQuery( '.sticky-post--accordion-button' ).removeClass( 'collapsed' );
            jQuery( '.sticky-post--accordion-content' ).addClass( 'show' );
        } else {
            jQuery( '.sticky-post--accordion-button' ).addClass( 'collapsed' );
            jQuery( '.sticky-post--accordion-content' ).removeClass( 'show' );
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
        });
    }
});