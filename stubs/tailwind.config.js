const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],
    theme: {
        extend: {
            colors: {
                primary: '#5A67D8',
            },
            textColors: {
                primary: '#5A67D8'
            },
        },
    },
    extend: {
        fontFamily: {
            sans: ['Figtree', ...defaultTheme.fontFamily.sans],
        },
    },
};
