/**
 * Created by SAG on 07.03.2016.
 */
jQuery( document ).ready( function(  ) {
    /*** AJAX CONTACT FORM ***/
    $('#contactform').submit(function(){
        var action = $(this).attr('action');
        $("#message").slideUp(750,function() {
            $('#message').hide();
            $('#submit')
                .after('<img src="<?php echo get_template_directory_uri() ?>/images/ajax-loader.gif" class="loader" />')
                .attr('disabled','disabled');
            console.log(action);
            $.post(action, {
                    name: $('#name').val(),
                    email: $('#email').val(),
                    comments: $('#comments').val(),
                    verify: $('#verify').val()
                },
                function(data){
                    document.getElementById('message').innerHTML = data;
                    $('#message').slideDown('slow');
                    $('#contactform img.loader').fadeOut('slow',function(){$(this).remove()});
                    $('#submit').removeAttr('disabled');
                    if(data.match('success') != null) $('#contactform').slideUp('slow');

                }
            );
        });
        return false;
    });
});
