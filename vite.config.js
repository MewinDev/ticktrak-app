import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    // server: {
    //     host: 'localhost', // Or use your local IP if needed
    //     port: 5173,
    //     strictPort: true,
    //     hmr: {
    //         host: 'localhost', // Or use your local IP
    //     },
    // },
    build: {
        chunkSizeWarningLimit: 1000, // Set to 1000 kB (1MB)
    }
});
