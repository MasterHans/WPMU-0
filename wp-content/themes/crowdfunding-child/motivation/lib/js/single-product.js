//show / hide tabs and Back button in it
jQuery(document).ready(function ($) {
    $(".prettySocial").prettySocial();
    $(window).scroll(function () {
        //console.log($('.mt-campaign-content').offset().top);
        //console.log($(this).scrollTop());
        if ($(this).width() > 1025) {
            var elementOffset = $('.mt-campaign-content').offset().top;
            if ($(this).scrollTop() > 520) {
                $('.project-nav__buttons').animate({
                    opacity: 1
                }, 0, function () {
                    // Animation complete.
                });
            } else {
                $('.project-nav__buttons').animate({
                    opacity: 0
                }, 0, function () {
                    // Animation complete.
                });
            }

            if ($(this).scrollTop() > elementOffset) {
                $('.wpneo-tabs').addClass("sticky");
                //$('.project-nav__buttons').animate({
                //    opacity: 1
                //}, 0, function () {
                //    // Animation complete.
                //});
            } else {
                $('.wpneo-tabs').removeClass("sticky");
                //$('.project-nav__buttons').animate({
                //    opacity: 0
                //}, 0, function () {
                //    // Animation complete.
                //});
            }
        } else {
            $('.project-nav__buttons').animate({
                opacity: 0
            }, 0, function () {
                // Animation complete.
            });
        }
    })
//click on input "Make a pledge without a reward"
    $("#backing_amount").click(function () {
        $('.pledge__continue').attr('style', 'display: block;');
        $(this).closest('div.tab-rewards-wrapper').addClass('pledge--selected');
    });

    $("#add_comment_btn").on('click', function (e) {
        e.preventDefault();
        $('#review_form_wrapper').css({'display': 'block'});
        $('#new_comment').css({'display': 'none'});
    });

    //-------------------------------------
    //Modal
    //-------------------------------------
    $('.mt-all-or-nothing-modal-btn').on('click', function (e) {
        e.preventDefault();
        $('.mt-all-or-nothing-modal-wrapper').css({'display': 'block'});
    });
    $(document).on('click', '.wpneo-modal-close', function(){
        $('.mt-all-or-nothing-modal-wrapper').css({'display': 'none'});

        if ( $('#wpneo_crowdfunding_redirect_url').length > 0 ) {
            location.href = $('#wpneo_crowdfunding_redirect_url').val();
        }

    });

    $('.js-faq').on('click', function(e) {
        e.preventDefault();
        var t = (0, $)(this).closest(".js-faq"),
            n = t.find(".js-faq-answer"),
            i = (0, $)(this).data("faq_id"),
            a = t.find(".js-arrow-icon");
        //t.hasClass("js-expanded") ? (0, l.track)("Clicked Project FAQ Question", {
        //    context: "expanded",
        //    which: i
        //}) : (0, l.track)("Clicked Project FAQ Question", {
        //    context: "collapsed",
        //    which: i
        //}),
            t.toggleClass("js-expanded"), a.toggleClass("rotate-90"), n.toggleClass("hide")
    });

});
