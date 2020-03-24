(function ($) {
    "use strict";

    $(document).ready(function () {

        /*---------------------------------------------------
            Portfolio Filter
        ----------------------------------------------------*/
        var Container = $('#portfolio-area');
        Container.imagesLoaded(function () {
            var portfolio = $('.portfolio-menu');
            portfolio.on('click', 'button', function () {
                $(this).addClass('active').siblings().removeClass('active');
                var filterValue = $(this).attr('data-filter');
                $grid.isotope({
                    filter: filterValue
                });
            });
            var $grid = $('.portfolio-list').isotope({
                itemSelector: '.portfolio-grid'
            });

        });

        /*---------------------------------------------------
            Slider Carousel
        ----------------------------------------------------*/
        $('.slider').owlCarousel({
            loop: true,
            navText: ['<i class="icofont icofont-simple-left"></i>', '<i class="icofont icofont-simple-right"></i>'],
            nav: true,
            autoplay: true,
            autoplayTimeout: 5000,
            animateOut: 'fadeOut',
            animateIn: 'fadeIn',
            smartSpeed: 450,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 1
                },
                991: {
                    items: 1
                },
                1200: {
                    items: 1
                },
                1920: {
                    items: 1
                }
            }
        });
        /*---------------------------------------------------
            Partner Carousel
        ----------------------------------------------------*/
        $('.partner-list').owlCarousel({
            loop: true,
            margin: 10,
            responsive: {
                0: {
                    items: 2
                },
                768: {
                    items: 3
                },
                991: {
                    items: 4
                },
                1200: {
                    items: 5
                },
                1920: {
                    items: 5
                }
            }
        });
        /*---------------------------------------------------
            Testimonial Carousel
        ----------------------------------------------------*/
        $('.testimonial-carousel').owlCarousel({
            loop: true,
            margin: 10,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 1
                },
                991: {
                    items: 1
                },
                1200: {
                    items: 1
                },
                1920: {
                    items: 1
                }
            }
        });

        /*---------------------------------------------------
            Counter
        ----------------------------------------------------*/
        $('.counter-single h1').counterUp({
            delay: 10, // the delay time in ms
            time: 1000 // the speed time in ms
        });

        /*---------------------------------------------------
            Portfolio Image Preview PopUp
        ----------------------------------------------------*/
        $('.img-popup').magnificPopup({
            type: 'image',
            gallery: {
                enabled: true
            }
        });

        /*---------------------------------------------------
            Paralax Background
        ----------------------------------------------------*/
        $('.parallax-bg').scrolly({
            bgParallax: true
        });
    })

    /*---------------------------------------------------
        Smooth Scroll
    ----------------------------------------------------*/
    $(document).on('click', 'a[href^="#"]', function (event) {
        event.preventDefault();

        $('html, body').animate({
            scrollTop: $($.attr(this, 'href')).offset().top
        }, 500);
    });

    /*---------------------------------------------------
        Preloader
    ----------------------------------------------------*/
    $(window).on('load', function () {
        $('.site-preloader').fadeOut(500);
    })


}(jQuery));
