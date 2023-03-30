import "@splidejs/splide/css";
import "@splidejs/splide/css/skyblue";
import Splide from "@splidejs/splide";
import { AutoScroll } from "@splidejs/splide-extension-auto-scroll";

const splide = new Splide(".splide", {
    type: "loop",
    drag: "free",
    focus: "center",
    autoScroll: {
        speed: 1,
    },
});

splide.mount({ AutoScroll });
