import { Modal } from "flowbite";
// set the modal menu element
const $targetEl = document.getElementById("small-modal");

if ($targetEl) {
    // options with default values
    const options = {
        placement: "center-center",
        backdrop: "dynamic",
        backdropClasses:
            "bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40",
        closable: true,
        onHide: () => {
            console.log("modal is hidden");
        },
        onShow: () => {
            console.log("modal is shown");
        },
        onToggle: () => {
            console.log("modal has been toggled");
        },
    };

    /*
     * $targetEl: required
     * options: optional
     */
    const modal = new Modal($targetEl, options);

    modal.show();
}
