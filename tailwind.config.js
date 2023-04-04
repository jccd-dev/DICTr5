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
        extend: {
            colors: {
                "darker-blue": "#00296B",
                "dark-blue": "#003F88",
                "custom-blue": "#00509D",
                "custom-red": "#C1121F",
                "custom-yellow": "#FDC500",
                "dark-yellow": "#FFD500",
            },
        },
    },
    plugins: [],
};
