/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        fontFamily: {
            quicksand: "Quicksand",
            inter: "Inter",
        },
        extend: {},
    },
    plugins: [],
};
