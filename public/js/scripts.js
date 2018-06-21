$('a[href*="#"]')
.not('[href="#"]')
.not('[href="#0"]')
.click(function(event) {
    // On-page links
    if (
        location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '')
        &&
        location.hostname === this.hostname
    ) {
        // Figure out element to scroll to
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
        // Does a scroll target exist?
        if (target.length) {
            // Only prevent default if animation is actually gonna happen
            event.preventDefault();
            $('html, body').animate({
                scrollTop: target.offset().top
            }, 1000, function() {
                // Callback after animation
                // Must change focus!
                var $target = $(target);
                $target.focus();
                if ($target.is(":focus")) { // Checking if the target was focused
                    return false;
                } else {
                    $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
                    $target.focus(); // Set focus again
                };
            });
        }
    }
});


var controller = new ScrollMagic.Controller();

if(window.innerWidth > 550){
    console.log(true);
    new ScrollMagic.Scene({triggerElement: '#banner', triggerHook: 0, duration: '200%'})
        .setTween(
            TweenMax.to('#banner .phone', 2, {y: '40%'})
        )
        // .addIndicators()
        .addTo(controller);        

    new ScrollMagic.Scene({triggerElement: '#features', triggerHook: 1, duration: '130%'})
        .setTween(
            TweenMax.fromTo('#firstPhone', 1, 
                {x: '65%', opacity: 0.5},
                {x: '-14%', opacity: 1, ease: Power0.easeNone}
            )
        )
        // .addIndicators()
        .addTo(controller);


    new ScrollMagic.Scene({triggerElement: '#features', triggerHook: 1, duration: '130%'})
        .setTween(
            TweenMax.fromTo('#lastPhone', 1, 
                {x: '-65%', opacity: 0.5},
                {x: '14%', opacity: 1, ease: Power0.easeNone}
            )
        )
        // .addIndicators()
        .addTo(controller); 


    new ScrollMagic.Scene({triggerElement: '#testimonials', triggerHook: 0.4, duration: '130%'})
        .setTween(
            TweenMax.from('#testimonials .phone', 2, {y: '25%'})
        )
        // .addIndicators()
        .addTo(controller);        
}
else{

}