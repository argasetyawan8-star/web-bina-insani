import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {

        extend: {

            colors: {

                primary: "#2E3192",

                secondary: "#F6D21A",

                accent: "#ED1C24",

                surface: "#F8FAFC",

                text: "#1E293B",

            },

        },

    },

    plugins: [],

}