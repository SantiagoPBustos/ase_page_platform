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

/*Table Responsive*/
var $el = $(".table-responsive");
function anim() {
  var scrollTop = $el.scrollTop();
}
function stop(){
  $el.stop();
}
anim();
$el.hover(stop, anim);