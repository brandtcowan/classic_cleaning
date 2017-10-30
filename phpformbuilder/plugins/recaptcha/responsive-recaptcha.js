// Resize reCAPTCHA to fit width of container
// Since it has a fixed width, we're scaling
// using CSS3 transforms
// ------------------------------------------
// captchaScale = containerWidth / elementWidth

// from https://codepen.io/dloewen/pen/jbgeZj

function scaleCaptcha(elementWidth) {
    // Width of the reCAPTCHA element, in pixels
    var $recaptcha        = $('.g-recaptcha'),
        $recaptchaWrapper = $recaptcha.parent('.recaptcha-wrapper'),
        reCaptchaWidth    = 304,
        recaptchaHeight   = 78,
        captchaScale      = 1;
    // Get the containing element's width
    var containerWidth = $recaptchaWrapper.width();
    // Only scale the reCAPTCHA if it won't fit
    // inside the container
    if(reCaptchaWidth > containerWidth) {

        // Calculate the scale
        captchaScale = containerWidth / reCaptchaWidth;

        // Apply the transformation
        $recaptcha.css({
            'position': 'absolute',
            'width': containerWidth,
            'height': recaptchaHeight,
            'transform':'scale('+captchaScale+')'
        });
    } else {
        $('.g-recaptcha').css({
            'transform':'scale(1)'
        });
    }
    $recaptchaWrapper.css({
        'min-height': recaptchaHeight * captchaScale
    });
}

$(document).ready(function() {

    // Initialize scaling
    scaleCaptcha();

    // Update scaling on window resize
    $(window).resize($.throttle(100, scaleCaptcha));

});
