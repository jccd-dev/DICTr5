import formdata from "../utils/formdata";
import axios from "axios";

const formFilterSelects = document.querySelectorAll("#search-form select");
const formFilterInputs = document.querySelectorAll("#search-form input");
// const formInputs = document.querySelectorAll(
//     "#add-applicant input, #add-applicant select"
// );
const resultCon = document.querySelector("#results");
// handling form input elements
const handleChangeFormElements = async (e) => {
    e.preventDefault();
    let formData = formdata(document.querySelector("#search-form"));
    let res = await axios.get("/admin/search-logs", {
        params: formData,
    });

    resultCon.innerHTML = res.data;
};

[...formFilterSelects].forEach((el) =>
    el.addEventListener("change", handleChangeFormElements)
);

[...formFilterInputs].forEach((el) =>
    el.addEventListener("input", handleChangeFormElements)
);
