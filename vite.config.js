import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
  server: {
    cors: true,
    headers: { 'Access-Control-Allow-Origin': '*' },
  },
  plugins: [
    laravel({
      input: ['resources/css/app.css','resources/js/app.js'],
      refresh: true,
    }),
  ],
})