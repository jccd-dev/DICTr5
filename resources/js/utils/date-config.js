import date from "date-and-time";

const timeTop = document.querySelector(".ph-time").firstElementChild;
const timeBottom = document.querySelector(".ph-time").lastElementChild;

// let months = ['January', 'February', 'March']
setInterval(() => {
    let d = new Date();
    timeTop.textContent = date.format(d, "dddd, MMMM DD, YYYY");
    timeBottom.textContent = date.format(d, "hh:mm:ss A");
}, 1000);
