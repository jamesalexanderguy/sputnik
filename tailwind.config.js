/** @type {import('tailwindcss').Config} */
const config = {
  content: ['./app/**/*.php', './resources/**/*.{php,vue,js}'],
  safelist: [
    'sans',
    'wp-block-button__link',
    'has-scarletred-background',
    'has-babyblue-background',
    'has-darkroyal-background',
    'has-white-background',
  ],
  theme: {
    extend: {
      colors: {
        babyblue: '#97c5ff',
        babybluemid: '#b1d4ff',
        babybluelight: '#d6e8ff',
        faintgray: '#f7f9fc',
        faintgraydark: '#e9edf4',
        darkroyal: '#2a4269',
        scarletred: '#d91420',
      },
      fontFamily: {
        sans: ['Rajdhani', 'sans-serif'],
        inter: ['Inter', 'ui-sans-serif', 'system-ui'],
      },
      fontSize: {
        xs: ['0.75rem', { lineHeight: '1.25rem' }],
        sm: ['0.875rem', { lineHeight: '1.5rem' }],
        base: ['1rem', { lineHeight: '1.75rem' }],
        lg: ['1.125rem', { lineHeight: '1.75rem' }],
        xl: ['1.25rem', { lineHeight: '1.75rem' }],
        '2xl': ['1.5rem', { lineHeight: '2rem' }],
        '3xl': ['1.875rem', { lineHeight: '2.25rem' }],
        '4xl': ['2.25rem', { lineHeight: '2.5rem' }],
        '5xl': ['3rem', { lineHeight: '1' }],
        '6xl': ['3.75rem', { lineHeight: '1' }],
      },
    },
  },
  plugins: [],
};

export default config;
