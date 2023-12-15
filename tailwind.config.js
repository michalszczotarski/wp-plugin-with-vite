const zIndexObject = {};

for (let i = 6; i <= 20; i++) {
  zIndexObject[''+ `${(i * 10)}`] = `${(i * 10)}`;//generate index classes
}

/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './src/views/**/*.php',
    './src/scripts/**/*.js',
  ],
  safelist: [
    {
      pattern: /z-(200|1[0-9]{1}0|[0-9]{1}0)/ // Dopasowuje klasy z-index od 0 do 200
    },
  ],
  theme: {
    extend: {
      zIndex: zIndexObject,
    },
  },
  plugins: [],
}

