import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite'

export default defineConfig({
    plugins: [
        tailwindcss(),
        laravel({
            input: ['resources/css/app.css', 'resources/js/watch.js'],
            refresh: true, // watch Blade
        }),
    ],
    server: {
        host: '0.0.0.0', // Use 0.0.0.0 for HMR on Windows
        port: 5173,
        strictPort: true,
        hmr: {
            host: 'localhost', // ensures HMR works on Windows
            protocol: 'ws',
        },
    },
});
