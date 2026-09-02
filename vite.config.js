import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'site/resources/css/app.css',
                'site/resources/js/app.js',

                'sistema/resources/css/admin.css',
                'sistema/resources/js/admin.js',
            ],
            refresh: true,
        }),
    ],
});
