import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
  ],

  darkMode: 'class', // Enable dark mode using the 'class' strategy

  theme: {
    extend: {
      fontFamily: {
        sans: ['Figtree', ...defaultTheme.fontFamily.sans],
      },
      maxWidth: {
        sm: '24rem', // 384px
        md: '28rem', // 448px
        lg: '32rem', // 512px
        xl: '36rem', // 576px
        '2xl': '42rem', // 672px
        '3xl': '48rem', // 768px
        '4xl': '56rem', // 896px
        '5xl': '64rem', // 1024px
        '6xl': '72rem', // 1152px
        '7xl': '80rem', // 1280px
        '8xl': '90rem', // 1440px
        '9xl': '100rem', // 1600px
      },
      screens: {
        'xs': '480px', // Extra small screens
        'sm': '640px', // Small screens
        'md': '768px', // Medium screens
        'lg': '1024px', // Large screens
        'xl': '1280px', // Extra large screens
        '2xl': '1536px', // 2x Extra large screens
        '3xl': '1600px', // Custom large screen
        '4xl': '1920px', // 4x Extra large screens
        '5xl': '2560px', // 5x Extra large screens
      },
    },
  },

  plugins: [forms],
};
