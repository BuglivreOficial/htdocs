import { defineConfig } from 'vite'
import path from 'path'

export default defineConfig({
    root: 'resources',
    build: {
        outDir: '../public',
        emptyOutDir: true,
        rollupOptions: {
            input: {
                main: path.resolve(__dirname, 'resources/js/main.js'),
            },
            output: {
                entryFileNames: 'assets/main.js',
                assetFileNames: 'assets/main.css',
            },
        },
    },
})
