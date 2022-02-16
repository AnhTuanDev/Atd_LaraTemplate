const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors')

module.exports = {
    //mode: 'jit',
    //purge: [
    content: [
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
            inherit: colors.inherit,
            current: colors.current,
            transparent: colors.transparent,
            black: colors.black,
            white: colors.white,
            slate: colors.slate,
            gray: colors.gray,
            zinc: colors.zinc,
            neutral: colors.neutral,
            stone: colors.stone,
            red: colors.red,
            orange: colors.orange,
            amber: colors.amber,
            yellow: colors.yellow,
            lime: colors.lime,
            green: colors.green,
            emerald: colors.emerald,
            teal: colors.teal,
            cyan: colors.cyan,
            sky: colors.sky,
            blue: colors.blue,
            indigo: colors.indigo,
            violet: colors.violet,
            purple: colors.purple,
            fuchsia: colors.fuchsia,
            pink: colors.pink,
            rose: colors.rose,
        },
        extend: {
            fontFamily: {
                sans: ['Source Sans Pro', 'sans-serif', 'Nunito', ...defaultTheme.fontFamily.sans],
            },
            spacing: {
                '112': '28rem',
                '128': '32rem',
                '144': '36rem',
                '160': '40rem',
                '182': '44rem',
                '198': '48rem',
                '1/2': '50%',
                '1/3': '33.3333333%',
                '1/4': '25%',
                '1/5': '20%',
                '1/6': '16.666667%',
                '1/7': '14.285714',
            },
            scale: {
              175: '1.75',
              200: '2',
            },
        },
    },

    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
        require('@tailwindcss/aspect-ratio'),
    ],
};
