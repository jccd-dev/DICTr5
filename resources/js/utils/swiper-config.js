// core version + navigation, pagination modules:
import Swiper from "swiper/bundle";
// import Swiper and modules styles
import "swiper/css";
import "swiper/css/bundle";

// init Swiper:

const swiper = new Swiper(".swiper", {
    loop: true,
    direction: "horizontal",
    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
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

// console.log(swiper.autoplay.running);

export default swiper;
