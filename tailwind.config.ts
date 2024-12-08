import { Config } from 'tailwindcss/types/config';

export default {
    content: [
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.ts',
        './resources/**/*.js',
        'node_modules/preline/dist/*.js',
    ],
    theme: {
        colors: {
            primary: "#1ba957",
            secondary: "#e42328",
            gold: "#f7d617",
            success: "#29ad61",
            warning: "#fdcb4c",
            error: "#f36969",
            white: "#ffffff",
            bright: "#eeeeee", 
            whisper: "#e4e4e4",

            dark: "#1e1e1e", 
            black: "#000000",
        },
    },
    plugins: [
        require('preline/plugin'),
        require('@tailwindcss/forms'),
    ],
} satisfies Config;
