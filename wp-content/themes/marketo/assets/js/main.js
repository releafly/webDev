(function ($) {
    "use strict";

    /*------------------------------------------------------------------
    [Table of contents]

    mega navigation menu init
    back to top
    twitter api init
    map popups
    single banner slider
    xs tab slider
    xs tab slider 6 col
    xs deal of the day
    xs product slider 1
    xs product slider 2
    xs product slider 3
    deal of the day
    product slider 4
    product slider 5
    product slider 6
    product slider 7
    organic product slider 8
    organic product slider 9
    organic product slider 10
    product slider 11
    product slider 12
    product slider 13
    seven column slider
    xs progress
    input number increase
    echo init
    pulse effect
    countdown timer
    ajax chimp init
    xs popover
    number percentage
    number counter up

    -------------------------------------------------------------------*/

    /*==========================================================
                    4. custom input type select function
    ======================================================================*/
    $.fn.mySelect = function (options) {
        let $this = $(this),
            numberOfOptions = $(this).children('option');

        $this.addClass('select-hidden');
        $this.wrap('<div class="select"></div>');
        $this.after('<div class="select-styled"></div>');

        let styledSelect = $this.next('.select-styled');
        styledSelect.text($this.children('option').eq(0).text());

        let list = $('<ul />', {
            'class': 'select-options'
        }).insertAfter(styledSelect);

        for (let i = 0; i < numberOfOptions.length; i++) {
            $('<li />', {
                text: $this.children('option').eq(i).text(),
                rel: $this.children('option').eq(i).val()
            }).appendTo(list);
        }

        let listItems = list.children('li');

        styledSelect.on('click', function (e) {
            e.stopPropagation();
            $('.select-styled.active').not(this).each(function () {
                $(this).removeClass('active').next('.select-options').fadeIn();
            });
            $(this).toggleClass('active').next('.select-options').toggle();
            $(this).parent().toggleClass('focus');
        });

        listItems.on('click', function (e) {
            e.stopPropagation();
            styledSelect.text($(this).text()).removeClass('active');
            $this.val($(this).attr('rel'));
            list.hide();
            if ($(this).parent().parent().hasClass('focus')) {
                $(this).parent().parent().removeClass('focus');
            }
        });

        $(document).on('click', function () {
            styledSelect.removeClass('active');
            list.hide();
        });
    }

    if ($('.xs-category-select').length > 0) {
        $('.xs-category-select').mySelect();
    }


    $('.xs-countdown-timer[data-countdown]').each(function () {
        var $this = $(this),
            finalDate = $(this).data('countdown');

        $this.countdown(finalDate, function (event) {
            var $this = $(this).html(event.strftime(' '
                + '<div class="xs-timer-container"><span class="timer-count">%-D </span><span class="timer-title">Days</span></div>'
                + '<div class="xs-timer-container"><span class="timer-count">%H </span><span class="timer-title">Hours</span></div>'
                + '<div class="xs-timer-container"><span class="timer-count">%M </span><span class="timer-title">Minutes</span></div>'
                + '<div class="xs-timer-container"><span class="timer-count">%S </span><span class="timer-title">Secods</span></div>'));
        });
    });

    $.fn.myOwl = function (options) {

        var settings = $.extend({
            items: 1,
            dots: false,
            loop: false,
            mouseDrag: true,
            touchDrag: true,
            nav: false,
            autoplay: true,
            navText: ['', ''],
            margin: 0,
            stagePadding: 0,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            animateOut: 'fadeOut',
            animateIn: 'fadeIn',
            navRewind: false,
            responsive: {}
        }, options);

        return this.owlCarousel({
            items: settings.items,
            loop: settings.loop,
            mouseDrag: settings.mouseDrag,
            touchDrag: settings.touchDrag,
            nav: settings.nav,
            navText: settings.navText,
            dots: settings.dots,
            margin: settings.margin,
            stagePadding: settings.stagePadding,
            autoplay: settings.autoplay,
            autoplayTimeout: settings.autoplayTimeout,
            autoplayHoverPause: settings.autoplayHoverPause,
            animateOut: settings.animateOut,
            animateIn: settings.animateIn,
            responsive: settings.responsive,
            navRewind: settings.navRewind,
            onTranslate: function () {
                echo.render();
            }
        });
    };

//  email patern 
    function email_pattern(email) {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email);
    }

// menu vertical open and close when cross break point 
    function menuVertical() {
        var window_width = $(window).width(),
            breakPoint = 991,
            dropDonw_tigger = $('.v-menu-is-active .cd-dropdown-trigger'),
            dropdown = $('.v-menu-is-active .cd-dropdown'),
            activeClass = 'dropdown-is-active';

        if (window_width <= breakPoint) {
            if (dropDonw_tigger.hasClass(activeClass)) {
                dropDonw_tigger.removeClass(activeClass);
            }
            if (dropdown.hasClass(activeClass)) {
                dropdown.removeClass(activeClass);
            }
        } else {
            dropDonw_tigger.addClass(activeClass);
            dropdown.addClass(activeClass);
        }
    }

    function innerPageBreadcumb() {
        let promotion = $('.xs-promotion'),
            transparentHeader = $('.header-transparent'),
            totalHeight = Math.floor(promotion.outerHeight(true) + transparentHeader.outerHeight(true));

        $('.header-transparent + .xs-breadcumb').css('margin-top', totalHeight);

        $('.header-transparent ~ .page .xs-transparent').css('margin-top', totalHeight);
        $('.header-transparent + .xs-breadcumb + .page .xs-transparent').css('margin-top', 0);

    }

    function sliderHeightCalculate() {
        var parent = $('.product-block-slider'),
            child = $('.product-block-slider .item img');

        $('.product-block-category').each(function () {
            var $this = $(this),
                length = $this.length,
                height = $this.outerHeight(true),
                calcHeight = (height * 2) + 12 + 'px';

            if ($(window).width() > 1600) {
                parent.css('height', calcHeight);
                child.css('height', calcHeight);
            } else {
                parent.css('height', 'auto');
                child.css('height', 'auto');
            }
        })

    }


    $(window).on('load', function () {
        // menu vertical open and close when cross break point
        menuVertical();

        sliderHeightCalculate();

        innerPageBreadcumb();
        if ($('.dokan-widget-area').length > 0) {
            console.log('test');
            $('.dokan-widget-area').addClass('sidebar');
        }


        /* banner slider verison 5 push bootstrap markup */
        $('.xs-banner-slider-5 .owl-dots').wrap('<div class="container container-fullwidth"><div class="row"><div class="col-md-9 offset-md-3"></div></div></div>');
    }); // END load Function

    $(document).ready(function () {

        // menu vertical open and close when cross break point
        menuVertical();

        innerPageBreadcumb();

        sliderHeightCalculate();

        /*==========================================================
                mega navigation menu init
        ======================================================================*/
        if ($('.xs-menus').length > 0) {
            $('.xs-menus').xs_nav({
                mobileBreakpoint: 992,
            });
        }

        /*==========================================================
                back to top
        ======================================================================*/
        $(document).on('click', '.xs-back-to-top', function (event) {
            event.preventDefault();
            /* Act on the event */

            $('html, body').animate({
                scrollTop: 0,
            }, 1000);
        });

        /*==========================================================
                map popups
        ======================================================================*/
        if ($('.xs-map-popup').length > 0) {
            $('.xs-map-popup').magnificPopup({
                disableOn: 700,
                type: 'iframe',
                mainClass: 'mfp-fade',
                removalDelay: 160,
                preloader: false,
                fixedContentPos: false
            });
        }

        /*==========================================================
                    seven column slider
        ======================================================================*/


        /*==========================================================
                    xs progress
        ======================================================================*/
        if ($('.xs-progress').length > 0) {
            $('.xs-progress').each(function () {
                $(this).find('.progress-bar').css({
                    width: $(this).find('.progress-bar').attr('aria-valuenow') + '%',
                });
            });
        }

        $('.rate-graph').each(function () {
            if ($(this).find('.rate-graph-bar').attr('data-percent') <= 100) {
                $(this).find('.rate-graph-bar').css({
                    width: $(this).find('.rate-graph-bar').attr('data-percent') + '%',
                });
            } else {
                $(this).find('.rate-graph-bar').css({
                    width: 100 + '%',
                });
            }
        });

        /*=============================================================
               input number increase
      =========================================================================*/
        if (!String.prototype.getDecimals) {
            String.prototype.getDecimals = function () {
                var num = this,
                    match = ('' + num).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
                if (!match) {
                    return 0;
                }
                return Math.max(0, (match[1] ? match[1].length : 0) - (match[2] ? +match[2] : 0));
            }
        }
        $(document).on('click', '.plus, .minus', function () {
            // Get values
            var $qty = $(this).closest('.quantity').find('.qty'),
                currentVal = parseFloat($qty.val()),
                max = parseFloat($qty.attr('max')),
                min = parseFloat($qty.attr('min')),
                step = $qty.attr('step');

            // Format values
            if (!currentVal || currentVal === '' || currentVal === 'NaN') currentVal = 0;
            if (max === '' || max === 'NaN') max = '';
            if (min === '' || min === 'NaN') min = 0;
            if (step === 'any' || step === '' || step === undefined || parseFloat(step) === 'NaN') step = 1;

            // Change the value
            if ($(this).is('.plus')) {
                if (max && (currentVal >= max)) {
                    $qty.val(max);
                } else {
                    $qty.val((currentVal + parseFloat(step)).toFixed(step.getDecimals()));
                }
            } else {
                if (min && (currentVal <= min)) {
                    $qty.val(min);
                } else if (currentVal > 0) {
                    $qty.val((currentVal - parseFloat(step)).toFixed(step.getDecimals()));
                }
            }

            // Trigger change event
            $qty.trigger('change');
        });

        /*==========================================================
                    echo init
        ======================================================================*/
        echo.init({
            offset: 100,
            throttle: 100,
            unload: false,
        });

        if ($('.xs-nav-tab li a').length > 0) {
            $('.xs-nav-tab li a').on('click', function () {
                echo.render();
            });
        }

        /*==========================================================
                ajax chimp init
        ======================================================================*/
        if ($('.xs-newsletter').length > 0) {
            var mailchimp_url = $('.xs-newsletter').data('link');
            $('.xs-newsletter').ajaxChimp({
                url: mailchimp_url
            });

        }

        /*==========================================================
                xs popover
        ======================================================================*/
        if ($('.btn[data-toggle="popover"]').length > 0) {
            // popover init
            $('.btn[data-toggle="popover"]').popover();
            // popover add class
            $('.btn[data-toggle="popover"]').on('click', function (e) {
                e.preventDefault();
                if ($(this).hasClass('is-active')) {
                    $(this).removeClass('is-active');
                } else {
                    $(this).addClass('is-active')
                }
            });
        }

        /*==========================================================
                number percentage
        =======================================================================*/
        var number_percentage = $(".number-percentage");

        function animateProgressBar() {
            number_percentage.each(function () {
                $(this).animateNumbers($(this).attr("data-value"), true, parseInt($(this).attr("data-animation-duration"), 10));
            });
        }

        if ($('.waypoint-tigger').length > 0) {
            var waypoint = new Waypoint({
                element: document.getElementsByClassName('waypoint-tigger'),
                handler: function (direction) {
                    animateProgressBar();
                },
                offset: '50%'

            });
        }

        /*==========================================================
                number counter up
        =======================================================================*/
        $.fn.animateNumbers = function (stop, commas, duration, ease) {
            return this.each(function () {
                var $this = $(this);
                var start = parseInt($this.text().replace(/,/g, ""), 10);
                commas = (commas === undefined) ? true : commas;
                $({
                    value: start
                }).animate({
                    value: stop
                }, {
                    duration: duration == undefined ? 500 : duration,
                    easing: ease == undefined ? "swing" : ease,
                    step: function () {
                        $this.text(Math.floor(this.value));
                        if (commas) {
                            $this.text($this.text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
                        }
                    },
                    complete: function () {
                        if (parseInt($this.text(), 10) !== stop) {
                            $this.text(stop);
                            if (commas) {
                                $this.text($this.text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
                            }
                        }
                    }
                });
            });
        };

        $('.tigger-icon').on('click', function (event) {
            event.preventDefault();
            /* Act on the event */
            var this_item = $('.xs-social-tigger');
            if (this_item.hasClass('active')) {
                this_item.removeClass('active');
            } else {
                this_item.addClass('active');
            }
        });

        /*=============================================================
             sync slider
        =========================================================================*/

        if (($('.sync-slider-preview').length > 0) && ($('.sync-slider-thumb').length > 0)) {
            var sync1 = $(".sync-slider-preview"),
                sync2 = $(".sync-slider-thumb"),
                slidesPerPage = 3,
                syncedSecondary = true;
            sync1.owlCarousel({
                items: 1,
                slideSpeed: 2000,
                nav: false,
                autoplay: true,
                dots: false,
                loop: true,
                responsiveRefreshRate: 200,
                navText: [''],
            }).on('changed.owl.carousel', syncPosition);
            sync2
                .on('initialized.owl.carousel', function () {
                    sync2.find(".owl-item").eq(0).addClass("current");
                })
                .owlCarousel({
                    items: slidesPerPage,
                    dots: false,
                    nav: false,
                    smartSpeed: 200,
                    slideSpeed: 500,
                    margin: 30,
                    slideBy: slidesPerPage, //alternatively you can slide by 1, this way the active slide will stick to the first item in the second carousel
                    responsiveRefreshRate: 100,
                    responsive: {
                        // breakpoint from 0 up
                        0: {
                            items: 2,
                        },
                        1024: {
                            items: 3,
                        }
                    }
                }).on('changed.owl.carousel', syncPosition2);

            function syncPosition(el) {
                //if you set loop to false, you have to restore this next line
                //var current = el.item.index;

                //if you disable loop you have to comment this block
                var count = el.item.count - 1;
                var current = Math.round(el.item.index - (el.item.count / 2) - .5);
                if (current < 0) {
                    current = count;
                }
                if (current > count) {
                    current = 0;
                }

                //end block

                sync2
                    .find(".owl-item")
                    .removeClass("current")
                    .eq(current)
                    .addClass("current");
                var onscreen = sync2.find('.owl-item.active').length - 1;
                var start = sync2.find('.owl-item.active').first().index();
                var end = sync2.find('.owl-item.active').last().index();
                if (current > end) {
                    sync2.data('owl.carousel').to(current, 100, true);
                }
                if (current < start) {
                    sync2.data('owl.carousel').to(current - onscreen, 100, true);
                }
            }

            function syncPosition2(el) {
                if (syncedSecondary) {
                    var number = el.item.index;
                    sync1.data('owl.carousel').to(number, 100, true);
                }
            }

            sync2.on("click", ".owl-item", function (e) {
                e.preventDefault();
                var number = $(this).index();
                sync1.data('owl.carousel').to(number, 300, true);
            });
        }

        $('.offset-cart-menu').on('click', function (e) {
            e.preventDefault();
            $('.xs-sidebar-group').addClass('isActive');
        });
        $('.close-side-widget').on('click', function (e) {
            e.preventDefault();
            $('.xs-sidebar-group').removeClass('isActive');
        });

        $('.add_to_wishlist').on('click', function (e) {
            $(this).parent().addClass("feid-in");
        });

        $('.navsearch-button').on('click', function (e) {
            e.preventDefault();

            if (!($('.navsearch-form')).is(":visible")) {
                $(this).find('i').removeClass('fa-search').addClass('fa-search-minus');
            } else {
                $(this).find('i').removeClass('fa-search-minus').addClass('fa-search');
            }
            $(this).parent().parent().find('.navsearch-form').slideToggle(300);
        });

    }); // end ready function

    $(window).on('scroll', function () {

    }); // END Scroll Function

    $(window).on('resize', function () {

        innerPageBreadcumb();

        // menu vertical open and close when cross break point
        menuVertical();

        sliderHeightCalculate();
    }); // End Resize


})(jQuery);