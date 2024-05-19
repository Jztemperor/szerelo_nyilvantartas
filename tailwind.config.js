/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js"
    ],
    theme: {
        extend: {
            screens: {
                print: {raw: 'print'},
                screen: {raw: 'screen'}
            }
        },
    },
    plugins: [
        require('flowbite/plugin')
    ],
}

