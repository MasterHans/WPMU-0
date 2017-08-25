/**
 * Created by suvorovag on 25.08.2017.
 */
jQuery(document).ready(function ($) {

    //$("#set-post-thumbnail").click(function () {
    //    alert(12121);
    //});

    $(".button .media-button .button-primary .button-large .media-button-select").click(function () {
        alert(4444);
    });

    $('body').on('click', 'button.media-button-select', function (e) {
        alert(777);
    });

    $('#__wp-uploader-id-0').click(function () {
        console.log("You clicked on:");
        alert(56565656);
    });
    //media-toolbar

    wp.media.featuredImage.frame().on('open',function() {
        // Clever JS here
        alert(978987987987978);
    });

    wp.media.featuredImage.frame().on('open', function() {
        // Get the actual modal
        var modal = $(wp.media.featuredImage.frame().modal.el);
        // Do stuff when clicking on a thumbnail in the modal
        modal.on('click', '.attachment', function() {
            // Stuff and thangs
        })
            // Trigger the click event on any thumbnails selected previously
            .find('attachment.selected').trigger('click');
    });


});