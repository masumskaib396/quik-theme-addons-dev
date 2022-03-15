(function ($) {

    "use strict";
    // animated text script starts
    var Quiktheme_AnimatedText = function( $scope, $ ) {

        console.log($scope);

        var animatedWrapper = $scope.find( '.quiktheme-typed-strings' ).eq(0),
        animateSelector     = animatedWrapper.find( '.quiktheme-animated-text-animated-heading' ),
        animationType       = animatedWrapper.data( 'heading_animation' ),
        animationStyle      = animatedWrapper.data( 'animation_style' ),
        animationSpeed      = animatedWrapper.data( 'animation_speed' ),
        typeSpeed           = animatedWrapper.data( 'type_speed' ),
        startDelay          = animatedWrapper.data( 'start_delay' ),
        backTypeSpeed       = animatedWrapper.data( 'back_type_speed' ),
        backDelay           = animatedWrapper.data( 'back_delay' ),
        loop                = animatedWrapper.data( 'loop' ) ? true : false,
        showCursor          = animatedWrapper.data( 'show_cursor' ) ? true : false,
        fadeOut             = animatedWrapper.data( 'fade_out' ) ? true : false,
        smartBackspace      = animatedWrapper.data( 'smart_backspace' ) ? true : false,
        id                  = animateSelector.attr('id');

        if ( 'function' === typeof Typed ) {
            if( 'quiktheme-typed-animation' === animationType ){
                var typed = new Typed( '#'+id, {
                    strings: animatedWrapper.data('type_string'),
                    loop: loop,
                    typeSpeed: typeSpeed,
                    backSpeed: backTypeSpeed,
                    showCursor : showCursor,
                    fadeOut : fadeOut,
                    smartBackspace : smartBackspace,
                    startDelay : startDelay,
                    backDelay : backDelay
                });
            }
        }


        if ( $.isFunction( $.fn.Morphext ) ) {
            if( 'quiktheme-morphed-animation' === animationType ){
                $( animateSelector ).Morphext({
                    animation: animationStyle,
                    speed: animationSpeed
                });
            }
        }

    }

    /*---------------------------------------------------
    MODAL POPUP
    ----------------------------------------------------*/
    var Quiktheme_ModalPopup = function ($scope, $) {

        var modalWrapper    = $scope.find( '.quiktheme-modal' ).eq(0),
        modalOverlayWrapper = $scope.find( '.quiktheme-modal-overlay' ),
        modalItem           = $scope.find( '.quiktheme-modal-item' ),
        modalAction         = modalWrapper.find( '.quiktheme-modal-image-action' ),
        closeButton         = modalWrapper.find( '.quiktheme-close-btn' );

        modalAction.on( 'click', function(e) {
            e.preventDefault();
            var modalOverlay = $(this).parents().eq(1).next();
            var modal         = $(this).data( 'quiktheme-modal' );

            var overlay = $(this).data( 'quiktheme-overlay' );
            modalItem.css( 'display', 'block' );
            setTimeout( function() {
                $(modal).addClass( 'active' );
            }, 100);
            if ( 'yes' === overlay ) {
                modalOverlay.addClass( 'active' );
            }

        } );

        closeButton.click( function() {
            var modalOverlay = $(this).parents().eq(3).next();
            var modalItem    = $(this).parents().eq(2);
            modalOverlay.removeClass( 'active' );
            modalItem.removeClass( 'active' );

            var modal_iframe = modalWrapper.find( 'iframe' ),
            $modal_video_tag  = modalWrapper.find( 'video' );

            if ( modal_iframe.length ) {
                var modal_src = modal_iframe.attr( 'src' ).replace( '&autoplay=1', '' );
                modal_iframe.attr( 'src', '' );
                modal_iframe.attr( 'src', modal_src );
            }
            if ( $modal_video_tag.length ) {
                $modal_video_tag[0].pause();
                $modal_video_tag[0].currentTime = 0;
            }

        } );

        modalOverlayWrapper.click( function() {
            var overlay_click_close = $(this).data( 'quik_theme_overlay_click_close' );
            if( 'yes' === overlay_click_close ){
                $(this).removeClass( 'active' );
                $( '.quiktheme-modal-item' ).removeClass( 'active' );

                var modal_iframe = modalWrapper.find( 'iframe' ),
                $modal_video_tag = modalWrapper.find( 'video' );

                if ( modal_iframe.length ) {
                    var modal_src = modal_iframe.attr( 'src' ).replace( '&autoplay=1', '' );
                    modal_iframe.attr( 'src', '' );
                    modal_iframe.attr( 'src', modal_src );
                }
                if ( $modal_video_tag.length ) {
                    $modal_video_tag[0].pause();
                    $modal_video_tag[0].currentTime = 0;
                }
            }
        } );
    }


    //Creative Button
		var Quiktheme_Creative_Button = function($scope) {

			var btn_wrap = $scope.find('.quiktheme-creative-btn-wrap');
			var magnetic = btn_wrap.data('magnetic');
			var btn = btn_wrap.find('a.quiktheme-creative-btn');
			if( 'yes' == magnetic ){
				btn_wrap.on('mousemove', function(e) {
					var x = e.pageX - ( btn_wrap.offset().left + ( btn_wrap.outerWidth() / 2 ) );
					var y = e.pageY - ( btn_wrap.offset().top + ( btn_wrap.outerHeight() / 2 ) );
					btn.css("transform", "translate(" + x * 0.3 + "px, " + y * 0.5 + "px)");
				});
				btn_wrap.on('mouseout', function(e){
					btn.css("transform", "translate(0px, 0px)");
				});
			}
			//For expandable button style only
			var expandable = $scope.find('.quiktheme-eft--expandable');
			var text = expandable.find('.text');
			if ( expandable.length > 0 && text.length > 0 ) {
				text[0].addEventListener("transitionend", function () {
					if (text[0].style.width) {
						text[0].style.width = "auto";
					}
				});
				expandable[0].addEventListener("mouseenter", function (e) {
					e.currentTarget.classList.add('hover');
					text[0].style.width = "auto";
					var predicted_answer = text[0].offsetWidth;
					text[0].style.width = "0";
					window.getComputedStyle(text[0]).transform;
					text[0].style.width = "".concat(predicted_answer, "px");

				});
				expandable[0].addEventListener("mouseleave", function (e) {
					e.currentTarget.classList.remove('hover');
					text[0].style.width = "".concat(text[0].offsetWidth, "px");
					window.getComputedStyle(text[0]).transform;
					text[0].style.width = "";
				});
			}
		};

        // timer
        function makeTimer() {

            var quik_theme_addonsDate = $(".quiktheme-addons-countdown#date").data("date");
            var endTime = new Date(quik_theme_addonsDate);
            endTime = (Date.parse(endTime) / 1000);

            var now = new Date();
            now = (Date.parse(now) / 1000);

            var timeLeft = endTime - now;

            var days = Math.floor(timeLeft / 86400);
            var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
            var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600)) / 60);
            var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));

            if (hours < "10") {
                hours = "0" + hours;
            }
            if (minutes < "10") {
                minutes = "0" + minutes;
            }
            if (seconds < "10") {
                seconds = "0" + seconds;
            }

            $("#days").html(days);
            $("#hours").html(hours);
            $("#minutes").html(minutes);
            $("#seconds").html(seconds);

        }

        var Quiktheme_CountDown = function() {
            setInterval(function() {
                makeTimer();
            }, 1000);
        }


        // Source Code
		var Quiktheme_SourceCode = function ($scope) {
			var $item = $scope.find('.quiktheme-source-code');
			var $lng_type = $item.data('lng-type');
			var $after_copy_text = $item.data('after-copy');
			var $code = $item.find('code.language-' + $lng_type);
			var $copy_btn = $scope.find('.quiktheme-copy-code-button');

			$copy_btn.on('click', function () {
				var $temp = $("<textarea>");
				$(this).append($temp);
				$temp.val($code.text()).select();
				document.execCommand("copy");
				$temp.remove();
				if ($after_copy_text.length) {
					$(this).text($after_copy_text);
				}
			});

			if ($lng_type !== undefined && $code !== undefined) {
				Prism.highlightElement($code.get(0));
			}



		};

        var Quiktheme_Back_To_Top = function($scope, $) {
            var btn = $('.quiktheme-addons-icon');
            $(window).scroll(function() {
                if ($(window).scrollTop() > 300) {
                  btn.addClass('show');
                } else {
                  btn.removeClass('show');
                }
            });
            btn.on('click', function(e) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop:0
                }, '300');
            });

        }



        // Content Switcher Handler
        var Quiktheme_ContentSwitcher = function ( $scope, $ ) {

            var main_switch = $scope.find( '.quiktheme-content-switcher-toggle-switch' );
            var main_switch_span = main_switch.find( '.quiktheme-content-switcher-toggle-switch-slider' );

            var content_1 = $scope.find('.quiktheme-content-switcher-primary-wrap');
            var content_2 = $scope.find('.quiktheme-content-switcher-secondary-wrap');

            if( main_switch_span.is( ':checked' ) ) {
                content_1.hide();
                content_2.show();
            } else {
                content_1.show();
                content_2.hide();
            }

            main_switch_span.on('click', function(e){
                content_1.toggle();
                content_2.toggle();
            });
        };



     // Make sure you run this code under Elementor..
        $(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction('frontend/element_ready/quiktheme-animated.default', Quiktheme_AnimatedText);
            elementorFrontend.hooks.addAction('frontend/element_ready/quiktheme-modal-popup.default', Quiktheme_ModalPopup);
            elementorFrontend.hooks.addAction('frontend/element_ready/quiktheme-creative-button.default', Quiktheme_Creative_Button);
            elementorFrontend.hooks.addAction('frontend/element_ready/quiktheme-addons-countdown.default', Quiktheme_CountDown);
            elementorFrontend.hooks.addAction('frontend/element_ready/quiktheme-source-code.default', Quiktheme_SourceCode);
            elementorFrontend.hooks.addAction('frontend/element_ready/quiktheme-back-to-top.default', Quiktheme_Back_To_Top);
            elementorFrontend.hooks.addAction('frontend/element_ready/quiktheme-content-switcher.default', Quiktheme_ContentSwitcher);
        });

    })(jQuery);