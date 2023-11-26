/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      width:{
        "1/7": "calc(100%/7)"
      }
    },
  },
  plugins: [],
}

