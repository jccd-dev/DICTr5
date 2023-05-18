const form = document.querySelector("#form");
const dataDelete = document.querySelector("button[data-delete]");
const messageAlert = document.querySelector("#message-alert");
const dismissAlert = document.querySelector("#dismiss-alert");
const closeAlertBtn = document.querySelector("#closeAlertBtn");
const formInputs = form.querySelectorAll("input, select");
const closeBtn = document.querySelector("#close-btn");

closeAlertBtn.addEventListener("click", (_) => {
    dismissAlert.classList.toggle("hidden");
    location.reload();
});

form.addEventListener("submit", async (event) => {
    event.preventDefault();

    let formData = new FormData(event.target);

    try {
        let req = await axios.post("/admin/dict-admins/create", formData);
        if (req.status === 200) {
            dismissAlert.classList.remove("hidden");
            messageAlert.textContent = "Successfully Added Admin Account";
            closeBtn.click();

            setTimeout(() => {
                dismissAlert.classList.remove("hidden");
                location.reload();
            }, 2000);
        }
    } catch (e) {
        errorHandler(e.response?.data?.errors);
    }
});

const errorHandler = (err) => {
    formInputs.forEach((el) => el.nextElementSibling.classList.add("hidden"));
    for (const key in err) {
        formInputs.forEach((el) => {
            if (el.name === key) {
                el.nextElementSibling.classList.remove("hidden");
                el.nextElementSibling.textContent = err[key];
            }
        });
    }
};
