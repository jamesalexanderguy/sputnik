/** @type {import('tailwindcss').Config} */
const config = {
  content: ['./app/**/*.php', './resources/**/*.{php,vue,js}'],
  safelist: [
    'sans',
    'wp-block-button__link',
    'wp-block-button__link::after',
    'wp-block-button__link:hover::after',
    'has-scarletred-background',
    'has-babyblue-background',
    'has-darkroyal-background',
    'has-white-background',
    'has-babyblue-transp-background',
    'has-darkroyal-transp-background',
    'has-white-transp-background',
    {
      pattern: /mt-(0|1|2|3|4|5|6|7|8|9|10|12|16|20|24|32)/,
    },
    {
      pattern: /my-(0|1|2|3|4|5|6|7|8|9|10|12|16|20|24|32)/,
    },
    {
      pattern: /mb-(0|1|2|3|4|5|6|7|8|9|10|12|16|20|24|32)/,
    },
    {
      pattern: /mx-(0|1|2|3|4|5|6|7|8|9|10|12|16|20|24|32)/,
    },
  ],
  theme: {
    extend: {
      colors: {
        babyblue: '#97c5ff',
        white: '#ffffff',
        babybluemid: '#b1d4ff',
        babybluelight: '#d6e8ff',
        faintgray: '#f7f9fc',
        faintgraydark: '#e9edf4',
        darkroyal: '#2a4269',
        scarletred: '#d91420',
        transparent: 'transparent',
        'white-transp': 'rgba(255, 255, 255, 0.8)',
        'darkroyal-transp': 'rgba(42, 66, 105, 0.8)',
        'babybluelight-transp': 'rgba(214, 232, 255, 0.8)',
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
