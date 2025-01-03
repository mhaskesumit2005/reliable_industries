// testimonial swiper
var swiper = new Swiper(".review-slider", {
    spaceBetween: 20,
    loop:true,
    autoplay: {
        delay: 2000,
        disableOnInteraction: false,
    },
    breakpoints: {
        640: {
          slidesPerView: 1,
        },
        768: {
          slidesPerView: 2,
        },
        1024: {
          slidesPerView: 3,
        },
    },
});



// testimonial swiper
var testswiper = new TestSwiper(".review-slider", {
  spaceBetween: 20,
  loop:true,
  autoplay: {
      delay: 2000,
      disableOnInteraction: false,
  },
  breakpoints: {
      640: {
        slidesPerView: 1,
      },
      768: {
        slidesPerView: 2,
      },
      1024: {
        slidesPerView: 3,
      },
  },
});

