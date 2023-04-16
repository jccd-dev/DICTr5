/** @type {import('tailwindcss').Config} */
module.exports = {
    presets: [
        require('./vendor/wireui/wireui/tailwind.config.js'),
    ],
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
        './vendor/wireui/wireui/resources/**/*.blade.php',
        './vendor/wireui/wireui/ts/**/*.ts',
        './vendor/wireui/wireui/src/View/**/*.php'
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
    plugins: [
        require("flowbite/plugin"),
        require('@tailwindcss/typography'),
        require('@tailwindcss/forms'),
        require('@tailwindcss/aspect-ratio'),
    ],
    variants: {
        extend: {
            textColor: ["custom"], // Define custom state for text color
        },
    },
};
