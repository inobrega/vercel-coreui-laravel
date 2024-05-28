import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import copy from 'rollup-plugin-copy';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/sass/app.scss', 'resources/js/app.js'],
            refresh: true,
        }),
        copy({
            targets: [
                { src: 'node_modules/@coreui/icons/sprites/*', dest: 'public/icons/sprites' },
                { src: 'resources/assets/brand/*', dest: 'public/icons/sprites' }
            ]
        })
    ],
});
