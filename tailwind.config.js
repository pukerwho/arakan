module.exports = {
  mode: 'jit',
  purge: {
    enabled: true,
    content: ["./source/css/tailwind.css", "./**/*.php"],
  },
  darkMode: 'dark-mode', // or 'media' or 'class'
  theme: {
    extend: {},
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
