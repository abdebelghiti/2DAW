// @ts-check
import { defineConfig } from "astro/config";
import tailwindcss from "@tailwindcss/vite";

export default defineConfig({
    site: 'https://abdebelghiti.github.io',
    base: '/2DAW/dist/',
    vite: {
        plugins: [tailwindcss()],
    },
});