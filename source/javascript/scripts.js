$(".hamburger-toggle").on("click", function () {
  $(".hamburger-toggle__open").toggleClass("hidden");
  $(".hamburger-toggle__close").toggleClass("hidden");
  $(".mobile-menu").toggleClass("hidden").toggleClass("z-10");
  // $(".modal-bg").toggleClass("hidden").toggleClass("z-2");
  $("body").toggleClass("overflow-hidden");
});

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

$("#search_city_box").keyup(function () {
  var filter = $(this).val();
  filter = filter.toLowerCase();

  $(".allcity_item").each(function () {
    var metadata = $(this).data("metadata");
    var regexp = new RegExp(filter);
    var metadatastring = "";
    metadatastring = metadatastring.toLowerCase();

    if (typeof metadata.tag != "undefined") {
      metadatastring = metadata.tag.join(" ");
    }
    if (metadatastring.toLowerCase().search(regexp) < 0) {
      $(this).hide();
    } else {
      $(this).show();
    }
  });
});

// Modals
function openModal(attrModal) {
  $(".modal[data-modal=" + attrModal + "]").addClass("open");
  $(".modal-bg").removeClass("hidden").addClass("open");
  $("body").addClass("overflow-hidden");
}

function closeModal(attrModal) {
  $(".modal").removeClass("open");
  $(".modal-bg").addClass("hidden").removeClass("open");
  $("body").removeClass("overflow-hidden");
}

$(".modal-js").on("click", function (e) {
  var clickModalData = $(this).data("modal");
  openModal(clickModalData);
});

$(".modal_content_close").on("click", function () {
  closeModal();
});

document.addEventListener("click", function (e) {
  if (e.target.classList.value === "modal open") {
    closeModal();
  }
});
