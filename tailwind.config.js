const colors = require("tailwindcss/colors");
const defaultTheme = require("tailwindcss/defaultTheme");

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    darkMode: "class",

    theme: {
        extend: {
            fontFamily: {
                sans: ["Montserrat", "sans-serif"],
                serif: ["Playfair Display", "serif"],
            },
            colors: {
                luxury: {
                    50: "#F9F7F4",
                    100: "#F3EEE8",
                    200: "#E7DFD5",
                    300: "#D4C3B3",
                    400: "#C2A791",
                    500: "#A47E62",
                    600: "#8B654A",
                    700: "#725139",
                    800: "#5A3F2D",
                    900: "#422D21",
                    950: "#2A1D15",
                },
                accent: {
                    50: "#F5F3FF",
                    100: "#EDE9FE",
                    200: "#DDD6FE",
                    300: "#C4B5FD",
                    400: "#A78BFA",
                    500: "#8B5CF6",
                    600: "#7C3AED",
                    700: "#6D28D9",
                    800: "#5B21B6",
                    900: "#4C1D95",
                    950: "#2E1065",
                },
            },
            boxShadow: {
                luxury: "0 4px 20px rgba(164,126,98,0.1)",
                "luxury-lg": "0 10px 30px rgba(164,126,98,0.2)",
            },
        },
    },

    plugins: [require("@tailwindcss/forms")],
};
