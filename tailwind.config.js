/** @type {import('tailwindcss').Config} config */
const config = {
  content: ['./app/**/*.php', './resources/**/*.{php,vue,js}'],
  theme: {
    extend: {
      colors: {
        babyblue: '#97c5ff',
        scarletred: '#d91420',
      },
    },
  },
  plugins: [],
};

export default config;
