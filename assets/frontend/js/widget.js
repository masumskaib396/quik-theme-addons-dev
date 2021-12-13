(function ($) {

    "use strict";
    // animated text script starts
    var FinestAnimatedText = function( $scope, $ ) {

        var animatedWrapper = $scope.find( '.finest-typed-strings' ).eq(0),
        animateSelector     = animatedWrapper.find( '.finest-animated-text-animated-heading' ),
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
            if( 'finest-typed-animation' === animationType ){
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
            if( 'finest-morphed-animation' === animationType ){
                $( animateSelector ).Morphext({
                    animation: animationStyle,
                    speed: animationSpeed
                });
            }
        }
    }
    // animated text script ends



     // Make sure you run this code under Elementor..
        $(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction('frontend/element_ready/finest-animated.default', FinestAnimatedText);

        });

    })(jQuery);