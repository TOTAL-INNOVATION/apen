import defaultTheme from 'tailwindcss/defaultTheme';
import { Config } from 'tailwindcss/types/config';

export default {
    content: [
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        'node_modules/preline/dist/*.js',
    ],
    theme: {
        colors: {
            primary: "#1ba957",
            secondary: "#e42328",
            middle: "#f7d617",
            success: "#29ad61",
            warning: "#f07828",
            error: "#c61b25",
            black: "#000000",
            white: "#ffffff",
            gray: "#9ca3af",
            slate: "#e2e8f0",  
        },
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },
    plugins: [
        require('preline/plugin'),
    ],
} satisfies Config;
