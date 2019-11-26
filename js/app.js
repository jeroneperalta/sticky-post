jQuery(document).ready(function() {

    /*------------------------
    * vars
    *------------------------
    */
    var accordionButton = jQuery( '#sticky-post--accordion-button' );
    var accordionContent = jQuery( '#sticky-post--accordion-content' );

    /*------------------------
    * initialize
    *------------------------
    */
    placeholderText();
    stickyPost();

    accordionToggle();

    jQuery(window).resize(function () {
        /*------------------------
         * initialize
         *------------------------
         */
        stickyPost();
    });


    /*------------------------
    * functions
    *------------------------
    */
    function contentHeight() {
        var contentHeight = jQuery( '.sticky-post--accordion-content > *' ).height();
        return contentHeight;
    }

    function stickyPost() {

        contentHeight();

        var viewportWidth = jQuery(window).outerWidth();
        is_minimized(accordionContent);
        if (viewportWidth < 577) {
            accordionButton.addClass( 'minimize' );
            accordionContent.addClass( 'minimize' );
        } else {
            accordionButton.removeClass( 'minimize' );
            accordionContent.removeClass( 'minimize' );
        }
    }

    function accordionToggle() {
        is_minimized(accordionContent);
        accordionButton.click(function() {
            accordionButton.toggleClass( 'minimize' );
            accordionContent.toggleClass( 'minimize' );
            is_minimized(accordionContent);
        });
    }

    function is_minimized(content) {
        if ( content.hasClass( 'minimize' ) ) {
            content.css({
                'height' :  0,
            });
        } else {
            content.css({
                'height' :  contentHeight,
            });
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