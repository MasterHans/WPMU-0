/**
 * Created by sag on 02.09.2017.
 */
// Page layouts.
(function ($) {
    wp.customize('page_layout_column', function (value) {

        value.bind(function (to) {
            if ('one-column' === to) {
                $( 'body' ).addClass( 'page-one-column' ).removeClass( 'page-two-column' );
            } else {
                $('body').removeClass('page-one-column').addClass('page-two-column');
            }
        });
    });

    wp.customize('display_sidebar', function (value) {

        value.bind(function (to) {
            if (true === to) {
                $( 'body' ).addClass( 'has-sidebar' );
            } else {
                $('body').removeClass('has-sidebar');
            }
        });
    });

})(jQuery);