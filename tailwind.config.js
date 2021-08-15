const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            backgroundImage: theme => ({
                'complex': "url('/images/image-background.jpg')",
                'simple': "url('/images/background.jpg')",
                'game': "url('/images/game-background.jfif')",
            }),
            backgroundColor: {
                'purple': '#62007A',
                'light-purple': '#A800C6',
                'dark-purple': '#2D0038',
                'orange': '#FF6D00',
                'dark-orange': '#B54900',
                'green': '#00BF00',
                'dark-green': '#008400',
                'darker-green': '#006B00',
                'darkest-green': '#004700',
                'yellow': '#FFFF00',
                'dark-yellow': '#B7AE00',
                'light': '#CCCCCC',
                'light-green': '#00D800',
                'lighter-green': '#00FF00',
                'secondary': '#E6E6E6',
                'light-blue': '#00EFE3',
            },
            borderColor: {
                'purple': '#62007A',
                'light-purple': '#A800C6',
                'dark-purple': '#2D0038',
                'orange': '#FF6D00',
                'dark-orange': '#B54900',
                'green': '#00BF00',
                'dark-green': '#008400',
                'darker-green': '#006B00',
                'darkest-green': '#004700',
                'yellow': '#FFFF00',
                'dark-yellow': '#B7AE00',
                'light': '#CCCCCC',
                'light-green': '#00D800',
                'lighter-green': '#00FF00',
                'secondary': '#E6E6E6',
                'light-blue': '#00EFE3',
            },
            textColor: {
                'purple': '#62007A',
                'light-purple': '#A800C6',
                'dark-purple': '#2D0038',
                'orange': '#FF6D00',
                'dark-orange': '#B54900',
                'green': '#00BF00',
                'dark-green': '#008400',
                'darker-green': '#006B00',
                'darkest-green': '#004700',
                'yellow': '#FFFF00',
                'dark-yellow': '#B7AE00',
                'light': '#CCCCCC',
                'light-green': '#00D800',
                'lighter-green': '#00FF00',
                'secondary': '#E6E6E6',
                'light-blue': '#00EFE3',
            },
            gradientColorStops: theme => ({
                'purple': '#62007A',
                'light-purple': '#A800C6',
                'dark-purple': '#2D0038',
                'orange': '#FF6D00',
                'dark-orange': '#B54900',
                'green': '#00BF00',
                'dark-green': '#008400',
                'yellow': '#FFFF00',
                'dark-yellow': '#B7AE00',
                'light': '#CCCCCC',
                'light-green': '#00D800',
                'lighter-green': '#00FF00',
                'dark-green': '#008200',
                'secondary': '#E6E6E6',
                'light-blue': '#00EFE3',
            }),
            boxShadow: {
                'orange': '0 5px 5px rgba(181, 73, 0, 1)',
                'purple': '0 5px 5px rgba(45, 0, 56, 1)',
                'green': '0 5px 5px rgba(0, 132, 0, 1)'
            },
            fontFamily: {
                'logo': [ 'Zilla Slab', 'serif'],
            },
            borderRadius: {
                '4xl': '2rem',
                '5xl': '2.5rem',
                '6xl': '3rem',
                '7xl': '3.5rem',
                '8xl': '4rem',
                '9xl': '4.5rem',
                '10xl': '5rem',
                '11xl': '5.5rem',
                '12xl': '6rem',
                '13xl': '6.5rem',
                '14xl': '7rem',
            },
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
