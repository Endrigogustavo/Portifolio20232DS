
//Banner Slider
var swiper = new Swiper(".mySwiper", {
    slidesPerView: 1,
    loop: true,
    autoplay: {
    delay: 5000,
            },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });


//Logo Slider
var copy = document.querySelector(".logosom-slide").cloneNode(true);
      document.querySelector(".logosom").appendChild(copy);


