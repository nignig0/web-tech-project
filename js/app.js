$(document).ready(function() {
    // hero carosel
    $('#hero-slider').owlCarousel({
        loop:true,
        nav:true,
        items:1,
        smartSpeed: 1000,
        // autoplay:true,
        autoplayTimeout:3000,
        dots: false,
        navText: ['PREV', 'NEXT'],
        responsive:{
            0:{
               
            },
            600:{
               
            },
            1000:{
               
            }
        }
    })

});
