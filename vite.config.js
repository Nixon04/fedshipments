import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';
import vue from '@vitejs/plugin-vue';
import ip from 'ip';

export default defineConfig({

    build: {
        chunkSizeWarningLimit: 1600, 
        rollupOptions: {
            output: {
                manualChunks(id) {
                    if (id.includes('node_modules')) {
                        return id.split('node_modules/')[1].split('/')[0];
                    }
                }
            }
        }
    },

    plugins: [
        vue(),
        
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],

    server: {
        host: ip.address(),
        port: 5173,
        strictPort: true,
    }
});
