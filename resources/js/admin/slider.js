const datePickerIcons = document.querySelectorAll("[name='displayFormat']")
const messageAlert = document.querySelector('#message-alert');
const dismissAlert = document.querySelector('#dismiss-alert');
const closeAlertBtn = document.querySelector('#closeAlertBtn');
const headings = document.querySelectorAll("h3");

let targetHeading;
for (let i = 0; i < headings.length; i++) {
    if (headings[i].textContent === 'Update Slider') {
        targetHeading = headings[i];
        break;
    }
}
datePickerIcons.forEach((el) => {
    el.nextElementSibling.firstElementChild.lastElementChild.remove()
})

closeAlertBtn.addEventListener('click', _ => {
    dismissAlert.classList.toggle("hidden")
    location.reload()
})

window.addEventListener('ValidationSuccess', _ => {
    dismissAlert.classList.remove('hidden')
    messageAlert.textContent = "Successfully Added Slider"
    targetHeading.nextElementSibling.click()

    setTimeout(() =>{
        dismissAlert.classList.remove('hidden')
        location.reload()
    }, 2000)
})

window.addEventListener('UpdateSliderSuccess', async _ => {
    dismissAlert.classList.remove('hidden')
    messageAlert.textContent = "Successfully Updated Slider"
    targetHeading.nextElementSibling.click()

    setTimeout(() =>{
    dismissAlert.classList.remove('hidden')
        location.reload()
    }, 2000)

})
window.addEventListener('DeleteSliderSuccess', async _ => {
    dismissAlert.classList.remove('hidden')
    messageAlert.textContent = "Successfully Deleted Slider"
    targetHeading.nextElementSibling.click()

    setTimeout(() =>{
        dismissAlert.classList.remove('hidden')
        location.reload()
    }, 2000)
})
