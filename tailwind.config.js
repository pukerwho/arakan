module.exports = {
  mode: "jit",
  content: ["./**/*.php", "./src/**/*.js"],
  darkMode: "class",
  theme: {
    zIndex: {
      1: 1,
      2: 2,
      10: 10,
    },
    listStyleType: {
      auto: "auto",
      none: "none",
      disc: "disc",
      decimal: "decimal",
      square: "square",
    },
    container: {
      center: true,
      padding: "15px",
    },
    extend: {
      lineHeight: {
        12: "3rem",
        16: "4rem",
      },
      colors: {
        "main-dark": "#0B0B0F",
        "main-gray": "#17171a",
        "custom-light-gray": "#f5f5f5",
        "custom-gray": "#e5e7ec",
        primary: "#6266f0",
      },
      fontSize: {
        // '20xl': '20rem'
      },
      fontFamily: {
        heading: "Playfair Display",
      },
    },
  },
  variants: {
    extend: {},
  },
  // plugins: [require('@tailwindcss/typography')],
};
