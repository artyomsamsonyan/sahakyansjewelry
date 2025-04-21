jQuery(document).ready(function ($) {
    $('.showAllButton').on('click', function () {
        $('.filterButtons input').prop('checked', false);
    });

    function toggleClearButton() {
        let selectedFilters = $('.filterButtons input:checked').map(function () {
            return $(this).val();
        }).get();

        $('.modelCard').each(function () {
            let modelType = $(this).data('type');
            if (selectedFilters.length === 0 || selectedFilters.includes(modelType)) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });

        const anyChecked = $('.filterButtons input').is(':checked');
        $('.showAllButton').css({
            opacity: anyChecked ? '1' : '0',
            visibility: anyChecked ? 'visible' : 'hidden'
        });
    }

    $('.filterButtons input').on('change', toggleClearButton);

    $('.showAllButton').on('click', function () {
        $('.filterButtons input').prop('checked', false);
        toggleClearButton();
    });

    $('#load-more-btn').on('click', function () {
        var button = $(this);
        var page = button.data('page');

        $.ajax({
            url: ajax_object.ajax_url,
            method: 'GET',
            data: {
                action: 'load_more_models',
                page: page,
            },
            beforeSend: function () {
                button.text('Loading...');
            },
            success: function (response) {
                if (response) {
                    $('.portfolioModelsList').append(response);
                    button.data('page', page + 1);
                    button.text('Load More');
                } else {
                    button.text('No more models');
                    button.prop('disabled', true);
                }
            }
        });
    });

    let swiperInstance;

    $('.portfolioModelsListSection .modelCard .viewLink button').click(function () {
        const name = $(this).data('name');
        const images = $(this).data('images');
        const description = $(this).data('description');
        const email = $(this).data('email');
        const ref = $(this).data('ref');
        const link = $(this).data('link');
        $('.singleModelPopUp').find('.title').text(name);

        if (swiperInstance) {
            swiperInstance.destroy(true, true);
        }

        const $imageWrapper = $('.singleModelPopUp').find('.swiper-wrapper');
        $imageWrapper.empty();
        images.forEach(img => {
            $imageWrapper.append(`<div class="swiper-slide"><img src="${img.image.url}" alt="${name}"></div>`);
        });

        const $descWrapper = $('.singleModelPopUp').find('.description ul');
        $descWrapper.empty();
        description.forEach(item => {
            $descWrapper.append(`<li>${item.text}</li>`);
        });

        $('.singleModelPopUp').find('.phone').attr('href', `${link}`);
        $('.singleModelPopUp').find('.email').attr('href', `mailto:${email}`).find('span').text(email);
        $('.singleModelPopUp').find('.refNumber').text(`Ref. ${ref}`);

        if (images.length > 1) {
            $('.swiper-button-next').show();
            $('.swiper-button-prev').show();
            swiperInstance = new Swiper('.singleModelPopUp .singleModelSwiper', {
                loop: true,
                slidesPerView: 1,
                spaceBetween: 0,
                navigation: {
                    nextEl: ".singleModelPopUp .singleModelSwiper .swiper-button-next",
                    prevEl: ".singleModelPopUp .singleModelSwiper .swiper-button-prev",
                },
                autoplay: {
                    delay: 2500,
                },
            });
        } else {
            $('.swiper-button-next').hide();
            $('.swiper-button-prev').hide();
        }

        $('.singleModelPopUpWrapper').addClass('active');
        $('body').css('overflow', 'hidden');
    });

    $('.singleModelPopUpWrapper').click(function (e) {
        if (!$(e.target).closest('.singleModelPopUpWrapper .singleModelPopUp').length) {
            $(this).removeClass('active');
            $('body').css('overflow', 'auto');
        }
    });
});
