"use strict";

/**
 * navbar toggle
 */

const navOpenBtn = document.querySelector("[data-nav-open-btn]");
const navbar = document.querySelector("[data-navbar]");
const navCloseBtn = document.querySelector("[data-nav-close-btn]");
const overlay = document.querySelector("[data-overlay]");

const elemArr = [navCloseBtn, overlay, navOpenBtn];

for (let i = 0; i < elemArr.length; i++) {
  elemArr[i].addEventListener("click", function () {
    navbar.classList.toggle("active");
    overlay.classList.toggle("active");
  });
}

/**
 * toggle navbar & overlay when click any navbar-link
 */

const navbarLinks = document.querySelectorAll("[data-navbar-link]");

for (let i = 0; i < navbarLinks.length; i++) {
  navbarLinks[i].addEventListener("click", function () {
    navbar.classList.toggle("active");
    overlay.classList.toggle("active");
  });
}

/**
 * header & go-top-btn active
 * when window scroll down to 400px
 */

const header = document.querySelector("[data-header]");
const goTopBtn = document.querySelector("[data-go-top]");
const whatsAppBtn = document.querySelector("[data-whatsapp]");

window.addEventListener("scroll", function () {
  if (window.scrollY >= 400) {
    header.classList.add("active");
    goTopBtn.classList.add("active");
    whatsAppBtn.classList.add("active");
  } else {
    header.classList.remove("active");
    goTopBtn.classList.remove("active");
    whatsAppBtn.classList.remove("active");
  }
});

/**
 * input focus in contact us
 */

const inputs = document.querySelectorAll(".input");

function focusFunc() {
  let parent = this.parentNode;
  parent.classList.add("focus");
}

function blurFunc() {
  let parent = this.parentNode;
  if (this.value == "") {
    parent.classList.remove("focus");
  }
}

inputs.forEach((input) => {
  input.addEventListener("focus", focusFunc);
  input.addEventListener("blur", blurFunc);
});

/*======================== GSAP ========================*/
gsap.from(".hero .hero-banner", {
  opacity: 0,
  duration: 1,
  delay: 1,
  x: 200,
});
gsap.from(".hero .hero-content", {
  opacity: 0,
  duration: 1,
  delay: 1.5,
  y: -50,
});
gsap.from(".hero .hero-content a", {
  opacity: 0,
  duration: 1,
  delay: 2,
  y: -40,
});

/*======================== Scroll Reveal ========================*/

const scroll = ScrollReveal({
  distance: "60px",
  duration: 1000,
  delay: 200,
  reset: true,
});

scroll.reveal(
  ` 
    .about-page-banner,
    .features ul .card_1,
    .features ul .card_4,
    .service_important .bg-image`,
  {
    origin: "left",
    interval: 120,
  }
);

scroll.reveal(
  `
    .about .about-content,
    .about-page-content,
    .features ul .card_3,
    .features ul .card_6,
    .service_important .service_important_content`,

  {
    origin: "right",
    interval: 120,
  }
);

scroll.reveal(
  `
            .service h2,
            .service .section-text,
            .features h1,
            .features .section-text,
            .features ul .card_2`,
  {
    origin: "top",
    interval: 200,
    delay: 200,
  }
);

scroll.reveal(
  `   
            .service ul li,
            .features ul .card_5,
            .service_page_details_top h1,
            .service_page_details_top p,
            .service_other_features,
            .contact-us .social-list li,
            .ceo .ceo-content h1,
            .ceo .ceo-content h2,
            .ceo .ceo-content span`,
  {
    origin: "bottom",
    interval: 200,
    delay: 200,
    duration: 1000,
  }
);

scroll.reveal(
  `   
    .ceo .ceo-content .ceo-text-1`,
  {
    origin: "bottom",
    interval: 200,
    delay: 200,
    duration: 2000,
  }
);

scroll.reveal(
  `   
    .ceo .ceo-content .ceo-text-2`,
  {
    origin: "bottom",
    interval: 200,
    delay: 200,
    duration: 2300,
  }
);

scroll.reveal(
  `   
    .ceo .ceo-content .ceo-text-3`,
  {
    origin: "bottom",
    interval: 200,
    delay: 200,
    duration: 2500,
  }
);
