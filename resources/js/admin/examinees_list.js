import formdata from "../utils/formdata";
import axios from "axios";

const formFilterSelects = document.querySelectorAll("#search-form select");
const formFilterInputs = document.querySelectorAll("#search-form input");
// const formInputs = document.querySelectorAll(
//     "#add-applicant input, #add-applicant select"
// );
const resultCon = document.querySelector("#results");
// const addApplicant = document.querySelector("#add-applicant");
const seminarsCon = document.querySelector("#seminars-attended-new");
const addTrainings = document.querySelector("#add-trainings");
const removeTrainings = document.querySelector("#remove-trainings");

// const messageAlert = document.querySelector("#message-alert");
// const dismissAlert = document.querySelector("#dismiss-alert");
// const closeAlertBtn = document.querySelector("#closeAlertBtn");
// const headings = document.querySelectorAll("h3");

/**
 * Description placeholder
 * @date 5/17/2023 - 11:56:52 AM
 *
 * @param {string} [value=""]
 * @returns {string}
 */
const trainingTemplate = (value = "") => {
    return `
        <div class="flex md:flex-row flex-col w-full gap-3 relative">
            <div class="flex flex-1" >
                <div class="mb-3 md:mb-6 flex-1 flex-col">
                    <label for="" class="block text-sm font-medium text-gray-900 dark:text-white mb-1">Course / Seminar Title</label>
                        <input
                            type="text"
                            id=""
                            name="seminars-course[]"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="${value}"
                            placeholder="Course / Seminar Title"
                        >
                </div>
            </div>
            <div class="flex flex-1" >
                <div class="mb-3 md:mb-6 flex-1 flex-col">
                    <label for="" class="block text-sm font-medium text-gray-900 dark:text-white mb-1">Training Center</label>
                        <input
                            type="text"
                            id=""
                            name="seminars-center[]"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="${value}"
                            placeholder="Training Center"
                        >
                </div>
            </div>
            <div class="flex flex-1" >
                <div class="mb-3 md:mb-6 flex-1 flex-col">
                    <label for="" class="block text-sm font-medium text-gray-900 dark:text-white mb-1">Total Training Hours</label>
                        <input
                            type="number"
                            id=""
                            name="seminars-hours[]"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="${value}"
                            placeholder="Total Training Hours"
                        >
                </div>
            </div>
        </div>
        `;
};

/**
 * Description placeholder
 * @date 5/17/2023 - 11:46:04 AM
 *
 * @type {{ index: number; trainingTemplate: (index: any, value?: string) => string; add: () => void; remove: () => void; }}
 */
const Trainings = {
    trainingTemplate: trainingTemplate,

    add: function () {
        console.log(this);
        seminarsCon.insertAdjacentHTML("beforeend", this.trainingTemplate());
    },

    remove: function () {
        const semCon = document.querySelector("#seminars-attended-new");
        semCon.lastElementChild.remove();
    },
};

Trainings.add();

// start

// handling form input elements
const handleChangeFormElements = async (e) => {
    e.preventDefault();
    let formData = formdata(document.querySelector("#search-form"));
    let res = await axios.get("/admin/examinee/search", {
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

// end

// addApplicant.addEventListener("submit", async (event) => {
//     event.preventDefault();

//     const formData = new FormData(addApplicant);

//     try {
//         let res = await axios.post("/admin/examinee/add-examinee", formData);

//         if (res) {
//             dismissAlert.classList.remove("hidden");
//             messageAlert.textContent = "Successfully Added";
//             targetHeading.nextElementSibling.click();

//             setTimeout(() => {
//                 dismissAlert.classList.remove("hidden");
//                 location.reload();
//             }, 2000);
//         }
//     } catch (err) {
//         errorHandler(err.response?.data?.errors);
//     }
// });

// const errorHandler = (err) => {
//     console.log(formInputs);
//     // formInputs.forEach((el) =>
//     //     console.log(el.parentElement.parentElement.innerHTML)
//     // );
//     for (const key in err) {
//         formInputs.forEach((el) => {
//             console.log(el.name, key);
//             if (el.name === key) {
//                 console.log(2);
//                 if (el.parentElement.querySelector("p")) {
//                     let p = el.parentElement.querySelector("p");
//                     console.log(p);
//                     p.classList.remove("hidden");
//                     p.textContent = err[key];
//                 } else if (el.parentElement.parentElement.querySelector("p")) {
//                     let p = el.parentElement.parentElement.querySelector("p");
//                     p.classList.remove("hidden");
//                     p.textContent = err[key];
//                 } else {
//                     let p =
//                         el.parentElement.parentElement.parentElement.querySelector(
//                             "p"
//                         );
//                     p.classList.remove("hidden");
//                     p.textContent = err[key];
//                 }
//             }
//         });
//     }
// };

// let targetHeading;
// for (let i = 0; i < headings.length; i++) {
//     console.log(headings);
//     if (headings[i]?.nextElementSibling?.tagName === "BUTTON") {
//         targetHeading = headings[i];
//         break;
//     }
// }

// closeAlertBtn.addEventListener("click", (_) => {
//     dismissAlert.classList.toggle("hidden");
//     location.reload();
// });

addTrainings.addEventListener("click", () => Trainings.add());
removeTrainings.addEventListener("click", () => Trainings.remove());
