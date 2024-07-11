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
        'secondary-grey': '#ADADAD',
        'gold':'#FFBC39'
      }
    },
  },
  plugins: [],
}

