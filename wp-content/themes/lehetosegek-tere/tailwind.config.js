const theme = require('./theme.json');
const tailpress = require("@jeffreyvr/tailwindcss-tailpress");

/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './*.php',
    './**/*.php',
    './resources/css/**/*.css',
    './resources/js/**/*.js',
    './resources/ts/**/*.ts',
    './safelist.txt'
  ],
  safelist: [
    'placeholder:text-turquoise',
    'placeholder:uppercase',
    'md:ml-2',
    'md:mr-2'
  ],
  theme: {
    translate: {
      puzzle: 'cubic-bezier(0.22, 1, 0.36, 1)'
    },
    container: {
      padding: {
        DEFAULT: '1rem',
        sm: '2rem',
        lg: '0rem'
      },
    },
    extend: {
      backgroundImage: {
        magnifier: "url('/wp-content/themes/lehetosegek-tere/icon_magnifier.svg')",
        'chevron-right': "url('/wp-content/themes/lehetosegek-tere/icon_chevron_right.svg')",
        'chevron-left': "url('/wp-content/themes/lehetosegek-tere/icon_chevron_left.svg')",
        'close': "url('/wp-content/themes/lehetosegek-tere/icon_close.svg')"
      },
      colors: tailpress.colorMapper(tailpress.theme('settings.color.palette', theme)),
      fontSize: {
        '5xs': ['6px', '9px'],
        '4xs': ['8px', '12px'],
        '3xs': ['10px', '15px'],
        '2xs': ['12px', '18px'],
        'clamp-base': 'clamp(1rem, 5vw, 3rem)',
      },
      colors: {
        'turquoise': '#66c79a',
        'purple': '#ff00fd',
        'purple-light': '#e63df3',
        'red': '#f9101e',
        'red-orange': '#e63225',
        'orange': '#eb6b2d',
        'white-transparent': 'rgba(255,255,255,0.5)'
      },
      aspectRatio: {
        'tv': '4 / 3',
        'popup-image': '9 / 5'
      },
      borderRadius: {
        '4xl': '2rem'
      },
      keyframes: {
        puzzleAppear: {
          '0%': {
            opacity: '0',
            top: '40%'
          },
          '100%': {
            opacity: '100%',
            top: '50%'
          }
        }
      },
      animation: {
        puzzleAppear: 'puzzleAppear 1s',
      }
    },
    screens: {
      'xs': '480px',
      'sm': '600px',
      'md': '782px',
      'lg': tailpress.theme('settings.layout.contentSize', theme),
      'xl': tailpress.theme('settings.layout.wideSize', theme),
      '2xl': '1440px'
    }
  },
  plugins: [
    tailpress.tailwind
  ]
};
