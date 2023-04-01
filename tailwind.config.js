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
            lucida: "Lucida Unicode Calligraphy",
            lucidaBold: "Lucida Unicode Calligraphy Bold",
        },
        extend: {},
    },
    plugins: [],
};
