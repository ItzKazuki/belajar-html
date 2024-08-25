/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./php-day1/**/*.{html,js,php}",
    "./student-management/**/*.{html,js,php}"
  ],
  theme: {
    extend: {}
  },
  plugins: [require("daisyui")]
};
