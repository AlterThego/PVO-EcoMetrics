import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
const colors = require('tailwindcss/colors')

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./src/**/*.{html,js}",

        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./resources/**/*.vue",
        "./resources/**/*.js",

        "./node_modules/flowbite/**/*.js",

        './app/Http/Livewire/**/*Table.php',
        './vendor/power-components/livewire-powergrid/resources/views/**/*.php',
        './vendor/power-components/livewire-powergrid/src/Themes/Tailwind.php'],
    corePlugins: {
        aspectRatio: false,
    },
    theme: {
        container: {
            center: true,
            padding: {
                DEFAULT: '1rem',
                '2xl': '128px',
            }
        },
        extend: {

            fontFamily: {
                sans: ['Poppins', 'sans-serif'],
                serif: ['Aboreto', 'serif'],
            },
            colors: {
                "pg-primary": colors.gray,
                "custom-gray": '#F2F3F5',
                "custom-black": "#030400",
                "transparent": "transparent",
                "custom-white": "#f1f1f1",
                "custom-orange": "#eda358",
                "custom-yellow": "#FF8400",

                "custom-background": "#FFFAEB",
                "custom-tab": "#FF8400",
            },

        },
    },
    plugins: [forms,
        require('flowbite/plugin')({
            charts: true,
        }),
        require('tailwind-scrollbar'),
        require('@tailwindcss/aspect-ratio'),],

    darkMode: 'class',
}


