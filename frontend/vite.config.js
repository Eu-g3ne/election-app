import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'
const path = require('path')

// https://vitejs.dev/config/
export default defineConfig({
  alias: {
    '@': path.resolve(__dirname, './src')
  },
  plugins: [vue()],
  server: {
    port: 81,
    host: true,
  },
  build: {
    // generate manifest.json in outDir
    manifest: true,
    rollupOptions: {
      external: ['./vue-toastification/dist/index.css', './vite/modulepreload-polyfill'],
    }
  }
})
