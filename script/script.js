$(document).ready(() => {
    $('.menuOpen').click(() => {
        $('.menu-wrapper').addClass('active')
    })
    $('.menuClose').click(() => {
        $('.menu-wrapper').removeClass('active')
    })
    $(document).scroll(() => {
        $('.navbar').toggleClass('active', $(this).scrollTop() > $('.navbar').height())
    })
})

var swiper = new Swiper(".mySwiperHome", {
    slidePerView: "auto",
    centeredSLides: true,
    pagination: {
        el: ".swiper-pagination",
    },
    autoplay: {
        delay: 2000
    }

});
var swiper = new Swiper(".mySwiperProduct", {
    slidesPerView: "auto",
    spaceBetween: 30,
    navigation: {
        nextEl: ".bxs-chevron-right-circle",
        prevEl: ".bxs-chevron-left-circle",
    },
});

var swiper = new Swiper(".mySwiperTesti", {
    spaceBetween: 30,
    pagination: {
        el: ".swiper-pagination",
        dynamicBullets: true,
    },
    autoplay: {
        delay: 3000
    }
});