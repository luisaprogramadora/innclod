import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/estilos/plugins/fontawesome-free/css/all.min.css',
                'resources/estilos/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css',
                'resources/estilos/plugins/icheck-bootstrap/icheck-bootstrap.min.css',
                'resources/estilos/plugins/jqvmap/jqvmap.min.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    resolve: {
        alias: {
            vue: 'vue/dist/vue.esm-bundler.js',
        },
    },
});
