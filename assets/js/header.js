jQuery(document).ready(function ($) {
    const observer = new IntersectionObserver(
        ([entry]) => {
            if (!entry.isIntersecting) {
                $('header').addClass('scrolled');
            } else {
                $('header').removeClass('scrolled');
            }
        },
        { root: null, threshold: 0.3 }
    );

    observer.observe($('section')[0]);

    $(window).on("load", function () {
        animateSections();
            $('.page-loader').addClass('loaded');
            setTimeout(function () {
                $('.page-loader.loaded').remove();
            }, 1000);
    });

    function animateSections() {
        $("section").each(function () {
            let sectionTop = $(this).offset().top;
            let windowBottom = $(window).scrollTop() + $(window).height();

            if (sectionTop < windowBottom - 50) {
                $(this).addClass("animate__animated animate__fadeInUp");
            }
        });
    }

    $(window).on("scroll", animateSections);


    const lenis = new Lenis({
        duration: 1,
        easing: (t) => 1 - Math.pow(1 - t, 3),
        smooth: true,
    });

    function raf(time) {
        lenis.raf(time);
        requestAnimationFrame(raf);
    }

    requestAnimationFrame(raf);

    $('.openMobileMenu').on('click', function () {
        $('.mobileNavMenu').addClass('opened');
        $('.openMobileMenu').hide();
        $('.closeMobileMenu').show();
        $('.closeMobileMenu .black').show();
        $('.headerBox .mainLogo').css('color', '#000');
        $('body').css('overflow', 'hidden');
    });

    $('.closeMobileMenu').on('click', function () {
        $('.mobileNavMenu').removeClass('opened');
        $('.closeMobileMenu').hide();
        $('.openMobileMenu').show();
        $('.headerBox .mainLogo').css('color', '#fff');
        $('body').css('overflow', 'auto');
    });

    // $('.portfolioModelsListSection .modelCard .viewLink button').click(function () {
    //     lenis.stop();
    // });

    // $('.portfolioModelsListSection .singleModelPopUpWrapper').click(function (e) {
    //     if (!$(e.target).closest('.portfolioModelsListSection .singleModelPopUpWrapper .singleModelPopUp').length) {
    //         lenis.start();
    //     }
    // });

    $(window).on('load', function () {
        console.log("loading is ended");
    });

});
