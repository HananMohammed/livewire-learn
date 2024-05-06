/** @type {import('tailwindcss').Config} */
const colors = require('tailwindcss/colors')

module.exports = {
    theme: {

    },
    plugins: [],
    content: [
        "./resources/**/*.blade.php",
        "./resources/livewire/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
}
