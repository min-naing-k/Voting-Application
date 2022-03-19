const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
  content: [
    "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
    "./storage/framework/views/*.php",
    "./resources/views/**/*.blade.php",
  ],

  theme: {
    extend: {
      colors: {
        "gray-background": "#f7f8fc",
        blue: "#328af1",
        "blue-hover": "#2879bd",
        yellow: "#ffc73c",
        red: "#ec454f",
        green: "#1aab8b",
        purple: "#8b60ed",
      },
      spacing: {
        7.5: "1.875rem",
        70: "17.5rem",
        175: "43.75rem",
      },
      maxWidth: {
        custom: "64.5rem",
      },
      boxShadow: {
        card: "4px 4px 15px 0 rgba(36, 37, 38, 0.08)",
        dialog: "3px 4px 15px 0 rgba(36, 37, 38, 0.08)",
      },
      fontFamily: {
        sans: ["Open Sans", ...defaultTheme.fontFamily.sans],
      },
      fontSize: {
        xxs: ["0.625rem", { lineHeight: "1rem" }],
      },
    },
  },

  plugins: [require("@tailwindcss/forms"), require("@tailwindcss/line-clamp")],
};
