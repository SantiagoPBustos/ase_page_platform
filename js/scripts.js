/*Top Fixed Menu*/
$(document).ready(function () {
    let height = $(".menu").offset().top;

    $(window).on('scroll', function () {
        if ($(window).scrollTop() > height) {
            $('.menu').addClass('menu-fixed');
        } else {
            $('.menu').removeClass('menu-fixed');
        }
    });
});

/*Toggle Menu*/
const navToggle = document.querySelector(".nav-toggle");
const navMenu = document.querySelector(".nav-menu");

navToggle.addEventListener(("click"), () => {
    navMenu.classList.toggle("nav-menu_visible");
});

/*Swiper*/
let swiper = new Swiper(".swiper-container", {
    navigation: {
        prevEl: ".swiper-button-prev",
        nextEl: ".swiper-button-next",
    },

    slidesPerView: 1,
    spaceBetweein: 10,

    pagination: {
        el: ".swiper-pagination",
        clickeable: true
    },

    breakpoints: {
        650: {
            slidesPerView: 2
        },
        1024: {
            slidesPerView: 3,
            spaceBetweein: 10,
        },
        1200: {
            slidesPerView: 3,
            spaceBetweein: 10,
        },
        1400: {
            slidesPerView: 4,
            spaceBetweein: 10,
        },
    }
});

/*Swiper Jobs Imgs*/
const swiperJobs = new Swiper('.swiper-jobs', {
    loop: true,

    pagination: {
        el: ".swiper-pagination",
        clickeable: true
    },

    navigation: {
        prevEl: ".swiper-button-prev",
        nextEl: ".swiper-button-next",
    },

    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
    },
  });