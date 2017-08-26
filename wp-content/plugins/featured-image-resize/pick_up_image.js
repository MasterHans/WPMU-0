/**
 * Created by suvorovag on 25.08.2017.
 */
jQuery(document).ready(function ($) {

    wp.media.featuredImage.frame().on('select', function () {
        /* do something */
        var attachment_id;

        attachment_id = wp.media.featuredImage.get();
        var data = {
            action: 'resize_featured_image_on_fly',
            attachment_id: attachment_id
        };

        //alert(JSON.stringify(data));
        jQuery.post(ajaxurl, data, function (response) {
            //parse response
            //alert(response);
        });

    });

});