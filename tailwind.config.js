/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './resources/views/**/*.blade.php',
    './resources/js/**/*.js',
    './resources/css/**/*.css',
  ],
  theme: {
    extend: {
      colors: {
        "garuda-black": "#10062B",
        "garuda-grey": "#7F8194",
        "garuda-bg-grey": "#F3F6FD",
        "garuda-bg-dark-grey": "#C2C9DA",
        "garuda-orange": "#FFA44B",
        "garuda-blue": "#0068FF",
        "garuda-green": "#008541",
        "garuda-red": "#D71A21",
      }
    },
  },
  plugins: [],
}
