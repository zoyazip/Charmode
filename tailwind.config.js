/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        'main-green': '#204012',
        'secondary-green': '#B9D99A',
        'secondary-grey': '#ADADAD',
        'delivery-brown': '#D9B19A',
        'dark-brown': '#592F0A',
        'main-grey': '#5B5B5B',
        'gold':'#FFBC39',
        'product-red': '#F64141',
        'product-green': '#2F591B',
        'product-blue': '#4289F4',
        'product-white': '#ffffff',
        'product-black': '#000000'
      }
    },
  },
  plugins: [],
}

