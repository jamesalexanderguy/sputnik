/** @type {import('tailwindcss').Config} config */
const config = {
  content: ['./app/**/*.php', './resources/**/*.{php,vue,js}'],
  theme: {
    extend: {
      colors: {
        overlaycolor: '#7f7f7f',
        copyrightcolor: '#E6E6E6',
        hovercolor: '#EEE444',
        linkcolor: '#F0F0F0',
      }, 
      fontFamily: {
        sans: ['Inter', 'ui-sans-serif', 'system-ui'],
      },
    },
  },
  plugins: [],
};

export default config;
