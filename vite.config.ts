import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tsConfigPaths from "vite-tsconfig-paths";
import autoprefixer from "autoprefixer";
import tailwindcss from "tailwindcss";

export default defineConfig({
    css: {
        postcss: {
            plugins: [tailwindcss, autoprefixer],
        },
    },
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/ts/main.ts',
            ],
            refresh: true,
        }),
        tsConfigPaths(),
    ],
});
