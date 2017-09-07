(function($) {
    'use strict';

    var portfolio = {};
    edgtf.modules.portfolio = portfolio;

    portfolio.edgtfOnDocumentReady = edgtfOnDocumentReady;
    portfolio.edgtfOnWindowLoad = edgtfOnWindowLoad;
    portfolio.edgtfOnWindowResize = edgtfOnWindowResize;
    portfolio.edgtfOnWindowScroll = edgtfOnWindowScroll;
    portfolio.edgtfPortfolioSingleMasonry = edgtfPortfolioSingleMasonry;
    portfolio.edgtfPortfolioScrollableScroll = edgtfPortfolioScrollableScroll;

    $(document).ready(edgtfOnDocumentReady);
    $(window).load(edgtfOnWindowLoad);
    $(window).resize(edgtfOnWindowResize);
    $(window).scroll(edgtfOnWindowScroll);
    
    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function edgtfOnDocumentReady() {
        edgtfPortfolioSingleMasonry();
        edgtfPortfolioFullScreenSlider().init();
    }

    /* 
        All functions to be called on $(window).load() should be in this function
    */
    function edgtfOnWindowLoad() {
        edgtfPortfolioSingleFollow().init();
        edgtfPortfolioSingleStick().init();
        edgtfPortfolioScrollableList().init();
        edgtfPortfolioScrollableScroll();
    }

    /* 
        All functions to be called on $(window).resize() should be in this function
    */
    function edgtfOnWindowResize() {

    }

    /* 
        All functions to be called on $(window).scroll() should be in this function
    */
    function edgtfOnWindowScroll() {

    }



    var edgtfPortfolioSingleFollow = function() {

        var info = $('.edgtf-follow-portfolio-info .small-images.edgtf-portfolio-single-holder .edgtf-portfolio-info-holder, ' +
            '.edgtf-follow-portfolio-info .small-slider.edgtf-portfolio-single-holder .edgtf-portfolio-info-holder');

        if (info.length) {
            var infoHolder = info.parent(),
                infoHolderOffset = infoHolder.offset().top,
                infoHolderHeight = infoHolder.height(),
                mediaHolder = $('.edgtf-portfolio-media'),
                mediaHolderHeight = mediaHolder.height(),
                header = $('.header-appear, .edgtf-fixed-wrapper'),
                headerHeight = (header.length) ? header.height() : 0;
        }

        var infoHolderPosition = function() {

            if(info.length) {

                if (mediaHolderHeight > infoHolderHeight) {
                    if(edgtf.scroll > infoHolderOffset) {
                        var marginTop = edgtf.scroll - infoHolderOffset + edgtfGlobalVars.vars.edgtfAddForAdminBar + headerHeight + 20; //20 px is for styling, spacing between header and info holder
                        // if scroll is initially positioned below mediaHolderHeight
                        if(marginTop + infoHolderHeight > mediaHolderHeight){
                            marginTop = mediaHolderHeight - infoHolderHeight;
                        }
                        info.animate({
                            marginTop: marginTop
                        });
                    }
                }

            }
        };

        var recalculateInfoHolderPosition = function() {

            if (info.length) {
                if(mediaHolderHeight > infoHolderHeight) {
                    if(edgtf.scroll > infoHolderOffset) {

                        if(edgtf.scroll + headerHeight + edgtfGlobalVars.vars.edgtfAddForAdminBar + infoHolderHeight + 100 < infoHolderOffset + mediaHolderHeight) {    //70 to prevent mispositioning

                            //Calculate header height if header appears
                            if ($('.header-appear, .edgtf-fixed-wrapper').length) {
                                headerHeight = $('.header-appear, .edgtf-fixed-wrapper').height();
                            }
                            info.stop().animate({
                                marginTop: (edgtf.scroll - infoHolderOffset + edgtfGlobalVars.vars.edgtfAddForAdminBar + headerHeight + 20) //20 px is for styling, spacing between header and info holder
                            },400,'easeInOutQuad');
                            //Reset header height
                            headerHeight = 0;
                        }
                        else{
                            info.stop().animate({
                                marginTop: mediaHolderHeight - infoHolderHeight
                            });
                        }
                    } else {
                        info.stop().animate({
                            marginTop: 0
                        });
                    }
                }
            }
        };

        return {

            init : function() {

                infoHolderPosition();
                $(window).scroll(function(){
                    recalculateInfoHolderPosition();
                });

            }

        };

    };

    /**
     * Init Portfolio Single Masonry
     */
    function edgtfPortfolioSingleMasonry(){
        var gallery = $('.edgtf-portfolio-single-holder.small-masonry .edgtf-portfolio-media, .edgtf-portfolio-single-holder.big-masonry .edgtf-portfolio-media');

        if(gallery.length) {
            gallery.each(function () {
                var thisGallery = $(this);
                thisGallery.waitForImages(function () {
                    var size = thisGallery.find('.edgtf-single-masonry-grid-sizer').width();
                    edgtfPortfolioSingleResizeMasonry(size,thisGallery);
                    edgtfInitSingleMasonry(thisGallery);

                });
                $(window).resize(function(){
                    var size = thisGallery.find('.edgtf-single-masonry-grid-sizer').width();
                    edgtfPortfolioSingleResizeMasonry(size,thisGallery);
                    edgtfInitSingleMasonry(thisGallery);
                });
            });
        }
    }

    function edgtfInitSingleMasonry(container){
        container.animate({opacity: 1});
        container.isotope({
            itemSelector: '.edgtf-portfolio-single-media',
            masonry: {
                columnWidth: '.edgtf-single-masonry-grid-sizer'
            }
        });
    }


    function edgtfPortfolioSingleResizeMasonry(size,container){

        var defaultMasonryItem = container.find('.edgtf-default-masonry-item');
        var largeWidthMasonryItem = container.find('.edgtf-large-width-masonry-item');
        var largeHeightMasonryItem = container.find('.edgtf-large-height-masonry-item');
        var largeWidthHeightMasonryItem = container.find('.edgtf-large-width-height-masonry-item');

        defaultMasonryItem.css('height', size);
        largeHeightMasonryItem.css('height', Math.round(2*size));

        if(edgtf.windowWidth > 600){
            largeWidthHeightMasonryItem.css('height', Math.round(2*size));
            largeWidthMasonryItem.css('height', size);
        }else{
            largeWidthHeightMasonryItem.css('height', size);
            largeWidthMasonryItem.css('height', Math.round(size));
            largeHeightMasonryItem.css('height', Math.round(size));
        }
    }

    /**
     * Init Full Screen Slider
     */
    var edgtfPortfolioFullScreenSlider = function() {

        var sliderHolder = $('.edgtf-full-screen-slider-holder');
        var content = $('.edgtf-wrapper .edgtf-content');

        var sliders = $('.edgtf-portfolio-full-screen-slider');
        var fullScreenSliderHolder = $('.full-screen-slider');

        var edgtfFullScreenSliderHeight = function() {
            if (sliderHolder.length) {

                var contentMargin = parseInt(content.css('margin-top'));

                if(edgtf.windowWidth > 1024) {
                    if(contentMargin < 0) {
                        fullScreenSliderHolder.css("height", edgtf.windowHeight);
                        sliderHolder.css("height", edgtf.windowHeight);
                    }
                    else {
                        fullScreenSliderHolder.css("height", edgtf.windowHeight - edgtfGlobalVars.vars.edgtfMenuAreaHeight);
                        sliderHolder.css("height", edgtf.windowHeight - edgtfGlobalVars.vars.edgtfMenuAreaHeight);
                    }
                }
                else {
                    fullScreenSliderHolder.css("height", edgtf.windowHeight - edgtfGlobalVars.vars.edgtfMobileHeaderHeight);
                    sliderHolder.css("height", edgtf.windowHeight - edgtfGlobalVars.vars.edgtfMobileHeaderHeight);
                }
            }
        };

        var edgtfFullScreenOwlSlider = function() {

            if (sliderHolder.length) {
                sliders.each(function () {
                    var slider = $(this);


                    slider.on('init', function(slick){
						var activeSlide = slider.find('.slick-active.edgtf-portfolio-single-media');
                        if(activeSlide.hasClass('edgtf-slide-dark-skin')){
                            slider.removeClass('edgtf-slide-light-skin').addClass('edgtf-slide-dark-skin');
                        }else{
                            slider.removeClass('edgtf-slide-dark-skin').addClass('edgtf-slide-light-skin');
                        }
					});

                    slider.on('afterChange', function(slick, currentSlide){
						var activeSlide = slider.find('.slick-active.edgtf-portfolio-single-media');
                        if(activeSlide.hasClass('edgtf-slide-dark-skin')){
                            slider.removeClass('edgtf-slide-light-skin').addClass('edgtf-slide-dark-skin');
                        }else{
                            slider.removeClass('edgtf-slide-dark-skin').addClass('edgtf-slide-light-skin');
                        }
					});

                    slider.slick({
						infinite: true,
						slidesToShow : 1,
						arrows: true,
						dots: true,
						fade: true,
	                    easing: 'easeOutQuart',
						dotsClass: 'edgtf-slick-dots',
						prevArrow: '<span class="edgtf-slick-prev edgtf-prev-icon"><span class="icon-arrows-slim-left"></span></span>',
						nextArrow: '<span class="edgtf-slick-next edgtf-prev-icon"><span class="icon-arrows-slim-right"></span></span>',
						customPaging: function(slider, i) {
							return '<span class="edgtf-slick-dot-inner"></span>';
						}
                    }).animate({'opacity': 1}, 600);
                });
            }

        };

        var edgtfFullScreenSliderInfo = function() {

            if (sliderHolder.length) {

                var sliderContent = $('.edgtf-portfolio-slider-content');
                var close = $('.edgtf-control.edgtf-close');
                var description = $('.edgtf-description');
                var info = $('.edgtf-portfolio-slider-content-info');

                sliderContent.on('click',function(e){
                    e.preventDefault();
                    if (!sliderContent.hasClass('opened')) {
                        description.fadeOut(400, function() {
                            sliderContent.addClass('opened');
                            setTimeout(function(){
                                info.fadeIn(400);
                            }, 400);
                            setTimeout(function(){
                                $(".edgtf-portfolio-slider-content-info").niceScroll({
                                    scrollspeed: 60,
                                    mousescrollstep: 40,
                                    cursorwidth: 0,
                                    cursorborder: 0,
                                    cursorborderradius: 0,
                                    cursorcolor: "transparent",
                                    autohidemode: false,
                                    horizrailenabled: false
                                });
                            }, 800);
                        });
                    }
                });

                close.on('click',function(e){
                    e.preventDefault();
                    e.stopPropagation();
                    info.fadeOut( 400, function() {
                        sliderContent.removeClass('opened');
                        setTimeout(function() {
                            description.fadeIn(400);
                        }, 400);
                    });
                });

            }

        };
        return {
            init : function() {
                edgtfFullScreenSliderHeight();
                edgtfFullScreenOwlSlider();
                edgtfFullScreenSliderInfo();

                $(window).resize(function(){
                    edgtfFullScreenSliderHeight();
                });
            }
        };
    };

    /* Portfolio Single Split*/
    var edgtfPortfolioSingleStick = function(){
    	var portfolioSplit = $('.edgtf-portfolio-single-holder.split-screen');
        var info = $('.edgtf-follow-portfolio-info .split-screen.edgtf-portfolio-single-holder .edgtf-portfolio-info-holder');
        if (info.length && edgtf.htmlEl.hasClass('no-touch')) {
            var infoHolder = info.parent(),
                infoHolderOffset = infoHolder.offset().top,
                infoHolderHeight = info.outerHeight() + 100, //margin-bottom 100
                mediaHolder = $('.edgtf-portfolio-media'),
                mediaHolderHeight = mediaHolder.height(),
                header = $('.edgtf-page-header'),
                headerHeight = (header.length) ? header.height() : 0,
                infoHolderOffsetAfterScroll = headerHeight + 15; //15 is some default margin
        }


        var initInfoHolder = function(){
            if(info.length && edgtf.htmlEl.hasClass('no-touch')){
				var stickyActive = header.find('.edgtf-sticky-header');
				if (stickyActive.length){
					if (!stickyActive.hasClass('header-appear')){
						var headerVisible = (headerHeight - edgtf.scroll) > 0 ? true : false;
						if (headerVisible){
							infoHolderOffsetAfterScroll = edgtfGlobalVars.vars.edgtfAddForAdminBar + headerHeight - 5; // 5 is designer wishes
						}
						else{
							infoHolderOffsetAfterScroll = 24;
						}
					}
					else{
						infoHolderOffsetAfterScroll = edgtfGlobalVars.vars.edgtfStickyHeaderTransparencyHeight + edgtfGlobalVars.vars.edgtfAddForAdminBar + 15;
					}
				}
				if(info.length && mediaHolderHeight > infoHolderHeight && edgtf.htmlEl.hasClass('no-touch')) {
					info.outerWidth(infoHolder.width()).css('top',infoHolderOffsetAfterScroll+'px');
				}
			}
        };

        var calcInfoHolderPosition = function(){
            if(info.length && edgtf.htmlEl.hasClass('no-touch')){
                infoHolderHeight = info.outerHeight() + 100;
                mediaHolderHeight = mediaHolder.height();
                if(mediaHolderHeight > infoHolderHeight && edgtf.htmlEl.hasClass('no-touch')) {
                    if(edgtf.scroll >= infoHolderOffset - headerHeight-edgtfGlobalVars.vars.edgtfAddForAdminBar){
                        info.css('position','fixed');
                    }else{
                        info.css('position','static');
                    }
                    if(infoHolderOffset+mediaHolderHeight<=edgtf.scroll+infoHolderHeight + infoHolderOffsetAfterScroll){
                        info.stop().css('margin-top',infoHolderOffset + mediaHolderHeight - edgtf.scroll - infoHolderHeight - infoHolderOffsetAfterScroll+'px');
                    }else{
                        info.css('margin-top','0');
                    }
                }
            }
        };

        return {
            init: function(){
				if (portfolioSplit.length){
					initInfoHolder();
					calcInfoHolderPosition();
					$(window).scroll(function(){
						calcInfoHolderPosition();
						initInfoHolder();
					});
					$(window).resize(function(){
						initInfoHolder();
						calcInfoHolderPosition();
					});
				}
            }
        };
    };


    var edgtfPortfolioScrollableList = function(){
		var scrollableList = $('.edgtf-ptf-scrollable');
        var header = '';
        if($('.edgtf-fixed-wrapper').length){
            header = '.edgtf-page-header .fixed';
        }else{
            header = '.edgtf-page-header .header-appear';
        }

        scrollableList.hover(function(){
        	scrollableList.addClass('edgtf-ptf-hovered');
        },function(){
        	scrollableList.removeClass('edgtf-ptf-hovered');
        });

        var edgtfPortfolioScrollPosition = function(scrollableHolder){
			var thisMeta = scrollableHolder.find('.edgtf-ptf-list-showcase-meta'),
				thisMetaInner = thisMeta.find('.edgtf-ptf-list-showcase-meta-inner');
				thisMetaInner.css({
					'left': thisMeta.offset().left,
					'width': thisMeta.width()
				});
		};

		var edgtfPortfolioScrollFix = function(scrollableHolder){
			var thisMeta = scrollableHolder.find('.edgtf-ptf-list-showcase-meta'),
				thisMetaInner = thisMeta.find('.edgtf-ptf-list-showcase-meta-inner'),
				thisMetaInnerHeight = thisMetaInner.height(),
				thisPreview = scrollableHolder.find('.edgtf-ptf-list-showcase-preview'),
				thisPreviewOffsetTop = thisPreview.offset().top,
				thisPreviewOffsetBottom = thisPreview.offset().top + thisPreview.height(),
				topPosition = $(header).height() + edgtfGlobalVars.vars.edgtfAddForAdminBar;

			if (thisPreviewOffsetTop <= edgtf.scroll + topPosition && thisPreviewOffsetBottom > edgtf.scroll){
				if (!thisMeta.hasClass('edgtf-fix-meta')){
					thisMeta.addClass('edgtf-fix-meta');
					edgtfPortfolioScrollPosition(scrollableHolder);
				}
				if (thisPreviewOffsetBottom < edgtf.scroll + topPosition + thisMetaInnerHeight){
					thisMeta.addClass('edgtf-fix-bottom');
					thisMetaInner.css('top',thisPreviewOffsetBottom - (edgtf.scroll + thisMetaInnerHeight));
				}
				else{
					thisMeta.removeClass('edgtf-fix-bottom');
					thisMetaInner.css('top',topPosition);
				}
			}
			else{
				thisMeta.removeClass('edgtf-fix-meta');
				thisMeta.removeClass('edgtf-fix-bottom');
			}
		};


        var edgtfProjectsListHover = function(scrollableHolder){
			var thisMeta = scrollableHolder.find('.edgtf-ptf-list-showcase-meta'),
				thisMetaHolder = scrollableHolder.find('.edgtf-ptf-list-showcase-meta-items-holder'),
				thisPreviewHolder = scrollableHolder.find('.edgtf-ptf-list-showcase-preview'),
				thisMetaChildren = thisMetaHolder.find('.edgtf-ptf-list-showcase-meta-item'),
				thisPreviewChildren = thisPreviewHolder.find('.edgtf-ptf-list-showcase-preview-item'),
				thisMetaLink = thisMetaHolder.find('.edgtf-ptf-meta-item-title a'),
				projectNum = 1;

				thisPreviewChildren.on('mouseenter',function () {
					projectNum = $(this).index();
					var currentProject = $(this);


					thisMetaChildren.removeClass('active');
					thisPreviewChildren.removeClass('active');
					thisMetaChildren.clearQueue();
					thisMetaChildren.eq(projectNum).addClass('active');
					currentProject.addClass('active');
				});

				thisMetaChildren.on('click touch',function () {
					projectNum = $(this).index();
					var currentProject = $(this);
					var currentPreview = thisPreviewChildren.eq(projectNum);
					var currentScroll = currentPreview.offset().top - edgtf.windowHeight/2 + currentPreview.height()/2;
					var scrollFromTop = thisMeta.offset().top - $(header).height();


					thisMetaChildren.removeClass('active');
					thisPreviewChildren.removeClass('active');
					thisPreviewChildren.clearQueue();
					currentProject.addClass('active');
					currentPreview.addClass('active');

					if (projectNum == 0){
						edgtf.html.stop().animate({scrollTop: scrollFromTop},800);
					}
					else{
						edgtf.html.stop().animate({scrollTop: currentScroll},600);
					}
				});

				thisMetaLink.on('click touch',function (e) {
					var thisLink = $(this);

					if (!thisLink.parents('.edgtf-ptf-list-showcase-meta-item').hasClass('active')){
						e.preventDefault();
					}
				});

				scrollableHolder.on('mouseleave',function () {
					thisMetaChildren.removeClass('active');
					thisPreviewChildren.removeClass('active');
				});

        };

        return {

            init : function() {
            	if (scrollableList.length && edgtf.windowWidth > 768){
					scrollableList.each(function () {
						var thisScrollable = $(this);
						edgtfProjectsListHover(thisScrollable);
						edgtfPortfolioScrollFix(thisScrollable);
						edgtfPortfolioScrollPosition(thisScrollable);
						$(window).scroll(function(){
							edgtfPortfolioScrollFix(thisScrollable);
						});
						$(window).resize(function(){
							edgtfPortfolioScrollPosition(thisScrollable);
						});
					});
				}
            }

        };
    };

    /*
    **  Smooth scroll functionality for Portfolio List Scrollable
    */
    function edgtfPortfolioScrollableScroll(){

        var metaShowcase = $('.edgtf-ptf-list-showcase-meta-inner');

        if(metaShowcase.length){
            metaShowcase.niceScroll({ 
                scrollspeed: 60,
                mousescrollstep: 40,
                cursorwidth: 0, 
                cursorborder: 0,
                cursorborderradius: 0,
                cursorcolor: "transparent",
                autohidemode: false, 
                horizrailenabled: false 
            });
        }
    }
})(jQuery);