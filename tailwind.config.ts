import { Config } from "tailwindcss/types/config";
import defaultTheme from "tailwindcss/defaultTheme";

export default {
    darkMode: ["class"],
    content: [
        "./storage/framework/views/*.php",
        "./resources/**/*.blade.php",
        "./resources/ts/**/*.ts",
        "./resources/**/*.tsx",
        "./resources/**/*.js",
        "node_modules/preline/dist/*.js",
    ],
    theme: {
        container: {
            center: true,
        },
        colors: {
            primary: "#00a754",
            secondary: "#e6332a",
            gold: "#fcea10",
            success: "#29ad61",
            warning: "#fdcb4c",
            error: "#f36969",
            white: "#ffffff",
            bright: "#eeeeee",
            whisper: "#e4e4e4",
            rainee: "#aeb4ac",
            heather: "#a5becd",
            viridian: "#139ba0",
            chocolate: "#8e684c",
            dark: "#1a171b",
            black: "#000000",
            transparent: "rgba(0, 0, 0, 0)",
        },
        fontFamily: {
            "texta-black": "Texta Black",
            "franklin-regular": "Franklin Gothic Regular",
            "franklin-medium": "Franklin Gothic Medium",
        },
        animation: {
            "text-x-scroll": "textXscroll 30s linear infinite",
            ...defaultTheme.animation,
        },
        keyframes: {
            textXscroll: {
                from: {
                    transform: "translateX(100%)",
                },
                to: {
                    transform: "translateX(-100%)",
                },
            },
        },
    },
    plugins: [
        require("preline/plugin"),
        require("@tailwindcss/forms"),
        require("tailwindcss-animate"),
    ],
} satisfies Config;
