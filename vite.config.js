// import { defineConfig } from 'vite';
// import laravel from 'laravel-vite-plugin';
// import livewire from '@defstudio/vite-livewire-plugin';

// export default defineConfig({
//     plugins: [
//         laravel({
//             input: [
//                 'resources/css/app.css',
//                 'resources/js/app.js',
//             ],
//             refresh: true,
//         }),
//         livewire(),
//     ],
// });
// -------------------------------------------------------------------

import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                // CSS principal de Laravel (Tailwind/Bootstrap base si usas)
                'resources/css/app.css',
                
                // JS principal de Laravel (para Alpine, Axios, Echo, etc.)
                'resources/js/app.js',
                
                // CSS de la plantilla (Si prefieres compilarlo con Vite para HMR)
                // Si da problemas, muévelo también a public y cárgalo con <link>
                'resources/assets/css/qompac-ui.min.css',
                'resources/assets/css/custom.min.css',
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            '@': path.resolve(__dirname, 'resources'),
            '~': path.resolve(__dirname, 'node_modules'),
        },
    },
});
