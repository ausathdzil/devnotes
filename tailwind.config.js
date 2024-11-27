import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            colors: {
                primary: "hsl(210 40% 98%)",
                secondary: "hsl(226.2 57% 21%)",
                border: "hsl(215.4 16.3% 46.9%)",
            },
            borderRadius: {
                lg: "0.75rem",
                md: "calc(0.75rem - 2px)",
                sm: "calc(0.75rem - 4px)",
            },
            fontFamily: {
                sans: ["Manrope", ...defaultTheme.fontFamily.sans],
                serif: ["Merriweather", ...defaultTheme.fontFamily.serif],
            },
        },
    },

    plugins: [forms],
};
