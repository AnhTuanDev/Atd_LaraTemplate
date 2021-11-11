const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors')

module.exports = {
    mode: 'jit',
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        colors: {
            primary: {
                main: '#f3e5f5',
                light: '#ffffff',
                dark: '#c0b3c2',
                text: '#000000',
            },

            secondary: {
                main: '#7b1fa2',
                light: '#ae52d4',
                dark: '#4a0072',
                text: '#ffffff',
            },

            blue: {
                100: '#728cff',
                200: '#4d6bff',
                300: '#4354fe',
                400: '#3546ee',
                500: '#313ed1',
            },
            yellow: {
                100: '#fffbea',
                200: '#f9e7a4',
                300: '#f7da76',
                400: '#f4ce49',
                500: '#f1c21b',
            },
            gray: {
                50: '#f3f3f6',
                100: '#bbbcc9',
                200: '#a5a6b7',
                300: '#8f90a6',
                400: '#555770',
                500: '#28293e',
            },
            black: '#555770',

            transparent: 'transparent',
            current: 'currentColor',

            white: colors.white,
            red: colors.red,
            green: colors.emerald,
            indigo: colors.indigo,
            purple: colors.violet,
            pink: colors.pink,
        },
        extend: {
            fontFamily: {
                sans: ['Source Sans Pro', 'sans-serif', 'Nunito', ...defaultTheme.fontFamily.sans],
            },
            spacing: {
                '112': '28rem',
                '128': '32rem',
                '144': '36rem',
            },
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
