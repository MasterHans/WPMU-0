/**
 * Created by suvorovag on 25.08.2017.
 */
jQuery(document).ready(function ($) {
    //wp.media.featuredImage.frame().on('open', function () {
    //    // Get the actual modal
    //    var modal = $(wp.media.featuredImage.frame().modal.el);
    //    // Do stuff when clicking on a thumbnail in the modal
    //    modal.on('click', '.attachment', function () {
    //        // Stuff and thangs
    //        alert(7777777);
    //
    //    })
    //        // Trigger the click event on any thumbnails selected previously
    //        .find('attachment.selected').trigger('click', function () {
    //            alert(987987987987111);
    //        });
    //
    //    wp.media.featuredImage.frame().on('select', function () {
    //        /* do something */
    //        var attachment_id = wp.media.featuredImage.get();
    //        alert(attachment_id);
    //        console.log( attachment_id );
    //    });
    //});
    //Pick up selected featured image attachment_id
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
            alert(response);
        });

    });

});