import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { bunny } from 'laravel-vite-plugin/fonts';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
            fonts: [
                // Nagłówki i akcenty w klimacie pixel-art.
                bunny('Press Start 2P', {
                    alias: 'pixel',
                    weights: [400],
                }),
                // Treść i "terminal" — czytelny monospace.
                bunny('JetBrains Mono', {
                    alias: 'mono-terminal',
                    weights: [400, 500, 600, 700],
                }),
            ],
        }),
        tailwindcss(),
    ],
    server: {
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});
