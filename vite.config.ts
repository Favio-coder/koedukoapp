import inertia from '@inertiajs/vite';
import { wayfinder } from '@laravel/vite-plugin-wayfinder';
import tailwindcss from '@tailwindcss/vite';
import vue from '@vitejs/plugin-vue';
import laravel from 'laravel-vite-plugin';
import { bunny } from 'laravel-vite-plugin/fonts';
import { defineConfig } from 'vite';
import { VitePWA } from 'vite-plugin-pwa';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.ts'],
            refresh: true,
            fonts: [
                bunny('Instrument Sans', {
                    weights: [400, 500, 600],
                }),
            ],
        }),

        inertia(),
        tailwindcss(),

        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),

        wayfinder({
            formVariants: true,
        }),

        // ✅ PWA agregado aquí
        VitePWA({
            registerType: 'autoUpdate',

            manifest: {
                name: 'KoEduko',
                short_name: 'KoEduko',
                description: 'Plataforma educativa KoEduko',
                theme_color: '#ffffff',
                background_color: '#ffffff',
                display: 'standalone',
                start_url: '/',

                icons: [
                    {
                        src: '/apple-touch-icon.png',
                        sizes: '192x192',
                        type: 'image/png',
                    },
                    {
                        src: '/apple-touch-icon.png',
                        sizes: '512x512',
                        type: 'image/png',
                    },
                ],
            },

            workbox: {
                globPatterns: ['**/*.{js,css,html,ico,png,svg,webp}'],
            },
        }),
    ],
});