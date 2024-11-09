$(document).ready(function() {
    // hero carosel
    $('#hero-slider').owlCarousel({
        loop:true,
        nav:true,
        items:1,
        smartSpeed: 1000,
        autoplay:true,
        autoplayTimeout:3000,
        dots: false,
        navText: ['PREV', 'NEXT'],
        responsive:{
            0:{
               nav: false
            },
            768:{
                nav: true
            }
        }
    })


    // service carosel
    $('#services-slider').owlCarousel({
        loop:true,
        nav:true,
        smartSpeed: 1000,
        autoplay:true,
        autoplayTimeout:2000,
        margin: 25,
        dots: false,
        navText: ['PREV', 'NEXT'],
        responsive:{
            0:{
                items:1,
                nav: false,
                margin: 0
            },
            768:{
                items:2
            },
            1140:{
               items:2,
               center: true,
               dots: true
            }
        }
    })
    
});
