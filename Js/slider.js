new Swiper(".card-wrapper", {
    slidesPerView: 5,
    slidesPerGroup: 1,
    fade:true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
      dynamicBullets: true
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });