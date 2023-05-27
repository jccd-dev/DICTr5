import "../bootstrap";
import "flowbite";
import "../utils/flatpickr-config";
import "../utils/controls-config";
import "../utils/moment.js";
import "../utils/alpine-config.js";
import("preline");

// core version + navigation, pagination modules:
import Swiper from "swiper/bundle";
// import Swiper and modules styles
import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";

// init Swiper:

const swiper = new Swiper(".swiper", {
    loop: true,
    direction: "horizontal",
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
