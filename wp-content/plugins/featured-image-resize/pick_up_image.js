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

    $('media-toolbar-primary').on('click', 'button.media-button-select', function (e) {
        alert(777);
    });

    $('#__wp-uploader-id-0').click(function () {
        console.log("You clicked on:");
        alert(56565656);
    });
    //media-toolbar

});