/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js"
    ],
    theme: {
        colors: {
            'border-color-icon': '#e4e6e7'
        },
        extend: {},
    },
    plugins: [
        require('flowbite/plugin')
    ],
}
