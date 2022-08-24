let windowWidth = $(window).width();
let containerWidth = $(".container").width();

containerPadding = (windowWidth - containerWidth) / 2;

$(".left-container").css({ "margin-left": containerPadding + "px" });

$(".header_toggle").on("click", function () {
  $(this).toggleClass("open");
  $("body").toggleClass("overflow-hidden");
  $(".modal_bg").toggleClass("show filter blur-lg");
  $(".menu_mobile").toggleClass("show");
});

$(".place_tab").on("click", function (e) {
  e.preventDefault();
  let dataProfileTab = $(this).data("place_tab");
  $(".place_tab").removeClass("active");
  $(this).addClass("active");
  $(".place_tab_content").removeClass("active");
  $('.place_tab_content[data-place_tab="' + dataProfileTab + '"').addClass(
    "active"
  );
});

var swiperPopularProduct = new Swiper(".swiper-popular-product-container", {
  slidesPerView: 3,
  spaceBetween: 16,
  loop: true,
  autoplay: {
    delay: 5000,
  },
  breakpoints: {
    // when window width is >= 320px
    769: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
  },
  navigation: {
    nextEl: ".popular_arrows_next",
    prevEl: ".popular_arrows_prev",
  },
});

function readingTime() {
  const text = document.querySelector(".single-post .content").innerText;
  const wpm = 225;
  const words = text.trim().split(/\s+/).length;
  const time = Math.ceil(words / wpm);
  document.querySelector(".post-time-read span").innerText = time;
}
if (document.body.classList.contains("single-post")) {
  readingTime();
}
