const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors');

module.exports = {
    content: [
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/views/*.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        container: {
            center: true,
            padding: '16px',
        },
        screens: {
            '3xl': {
                max: '4096px',
            },
            '2xl': {
                max: '1560px',
            },
            xl: {
                max: '1440px',
            },
            lg: {
                max: '1366px',
            },
            md: {
                max: '1024px',
            },
            sm: {
                max: '767px',
            },
            xs: {
                max: '575px',
            },
        },
        fontFamily: {
            display: ['Manrope', ...defaultTheme.fontFamily.sans],
            body: ['Manrope', ...defaultTheme.fontFamily.sans],
        },
        fontSize: {
            xs: ['12px', '1.1'],
            sm: ['14px', '1.6'],
            md: ['15px', '1.75'],
            lg: ['20px', '1.3'],
            xl: ['25px', '1.3'],
            '2xl': ['31px', '1.3'],
            '3xl': ['39px', '1.3'],
            '4xl': ['48px', '1.3'],
        },
        colors: {
            transparent: 'transparent',
            base: {
                DEFAULT: '#2370cc',
            },
            white: '#ffffff',
            gray: {
                '100': '#eff4fd',
                '300': '#e3f1ff',
                '500': '#99a2ac',
                '700': '#525257',
                '900': '#2d3e4f',
            },
            black: '#000000',
            red: colors.red,
            green: colors.green,
        },
        spacing: {
            '0': '0',
            '0.5': '4px',
            '0.625': '5px',
            '1': '8px',
            '1.5': '12px',
            '2': '16px',
            '3': '24px',
            '4': '32px',
            '5': '40px',
            '6': '48px',
            '7': '56px',
            '8': '64px',
            '9': '72px',
            '10': '80px',
            '13': '104px',
            '20': '160px',
            '25': '200px',
            '30': '240px',
            '40': '320px',
            '50': '400px',
        },
        extend: {
            zIndex: {
                '1': '1',
                '2': '2',
                '3': '3',
                '4': '4',
                '5': '5',
            },
            borderRadius: {
                'none': 0,
                'sm': '5px',
                'DEFAULT': '8px',
                'md': '10px',
                'lg': '20px',
            },
        },
    },
};
