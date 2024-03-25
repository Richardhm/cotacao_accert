import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./node_modules/flowbite/**/*.js"
    ],

    theme: {
        extend: {
            backgroundImage: theme => ({
                'gradient-to-r': 'linear-gradient(to right, var(--tw-gradient-stops))',
            }),
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            spacing: {
                '128': '32rem',
                '144': '36rem',
              },
            borderRadius: {
                '4xl': '2rem',
            }  
        },
         screens: {
              sm: '480px',
              md: '768px',
              lg: '976px',
              xl: '1440px',
            },
            colors: {
              'blue': '#1fb6ff',
              'purple': '#7e5bef',
              'pink': '#ff49db',
              'orange': '#ff7849',
              'green': '#13ce66',
              'yellow': '#ffc82c',
              'gray-dark': '#273444',
              'gray': '#8492a6',
              'gray-light': '#d3dce6',
            },
    },

    plugins: [
        forms,
        
        require('flowbite/plugin')
    ],
};
