import formdata from "../utils/formdata";
import axios from "axios";

const formSelects = document.querySelectorAll("#search-form select");
const formInputs = document.querySelectorAll("#search-form input");
const resultCon = document.querySelector("#results");

const handleChangeFormElements = async (e) => {
    let formData = formdata(document.querySelector("#search-form"));
    let res = await axios.get("/admin/examinee/search", {
        params: formData,
    });

    resultCon.innerHTML = res.data;
};

[...formSelects].forEach((el) =>
    el.addEventListener("change", handleChangeFormElements)
);

[...formInputs].forEach((el) =>
    el.addEventListener("input", handleChangeFormElements)
);
