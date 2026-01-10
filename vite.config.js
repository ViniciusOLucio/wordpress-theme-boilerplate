import { defineConfig } from 'vite';
import path from 'path';
import dotenv from 'dotenv';
import fs from 'fs';

dotenv.config();

export default defineConfig({
  root: './',

  base: process.env.NODE_ENV === 'production'
    ? `/wp-content/themes/${process.env.THEME_NAME}/dist/`
    : '/',

  server: {
    host: 'localhost',
    port: 5173,
    strictPort: true,
    cors: true,
    hmr: {
      protocol: 'ws',
      host: 'localhost',
      port: 5173,
    },
    watch: {
      usePolling: true,
      interval: 100,
    },
  },

  plugins: [
    {
      name: 'wordpress-hot',
      configureServer(server) {
        const hotFile = path.resolve(__dirname, 'hot');
        const url = 'http://localhost:5173';

        fs.writeFileSync(hotFile, url);

        server.httpServer?.once('close', () => {
          if (fs.existsSync(hotFile)) {
            fs.unlinkSync(hotFile);
          }
        });
      },
    },
  ],

  build: {
    outDir: 'dist',
    emptyOutDir: true,
    manifest: '.vite/manifest.json',
    rollupOptions: {
      input: {
        app: path.resolve(__dirname, 'assets/js/app.js'),
      },
    },
  },

  css: {
    devSourcemap: true,
    preprocessorOptions: {
      scss: {
        api: 'modern-compiler',
        silenceDeprecations: ['import', 'legacy-js-api'],
      }
    }
  },
});
