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

//BLOG SUBJECTS
let blogSubjects = document.querySelector(".single-subjects");
let blogH2 = document.querySelectorAll(".single .content h2");
let blogSubjectsBlock = document.querySelector(".single-subjects-inner");
let blogH2Array = [];

if (blogH2.length > 0) {
  blogSubjects.style.display = "inline-block";
}

if (blogH2) {
  for (const [index, bH2] of blogH2.entries()) {
    bH2.id = "s" + index;
    let tempH2 = bH2.innerText;
    blogH2Array.push(tempH2);
  }
}

for (const [index, bH2Ar] of blogH2Array.entries()) {
  let tempH2Li = document.createElement("li");
  let tempH2A = document.createElement("a");
  tempH2Li.className = "mb-1";
  tempH2A.innerHTML = bH2Ar;
  tempH2A.href = "#s" + index;
  tempH2Li.append(tempH2A);
  blogSubjectsBlock.append(tempH2Li);
}

let anchors = document.querySelectorAll('.single-subjects-inner a[href*="#"]');

for (anchor of anchors) {
  if (anchor) {
    anchor.addEventListener("click", function (e) {
      e.preventDefault();
      anchorId = this.getAttribute("href");
      yOffset = -30;
      element = document.querySelector(anchorId);
      console.log(element);
      y = element.getBoundingClientRect().top + window.pageYOffset + yOffset;

      window.scrollTo({ top: y, behavior: "smooth" });
    });
  }
}
