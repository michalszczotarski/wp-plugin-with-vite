import path from 'path';
import { defineConfig } from 'vite';

const ROOT = path.resolve('../../../')
const BASE = __dirname.replace(ROOT, '');
// const BASE2 = BASE.replace('\\', '/');

console.log(ROOT);
console.log(BASE);
// console.log(BASE2);

export default defineConfig({
  base: process.env.NODE_ENV === 'production' ? `${BASE}/dist/` : BASE,
  build: {
    manifest: true,
    assetsDir: '.',
    outDir: `dist`,
    emptyOutDir: true,
    sourcemap: true,
    rollupOptions: {
      input: [
        'src/scripts/scripts.js',
        'src/styles/styles.scss',
      ],
      output: {
        entryFileNames: '[hash].js',
        assetFileNames: '[hash].[ext]',
      },
    },
  },
  plugins: [
    {
      name: 'php',
      handleHotUpdate({ file, server }) {
        if (file.endsWith('.php')) {
          server.ws.send({ type: 'full-reload' });
        }
      },
    },
  ],
});