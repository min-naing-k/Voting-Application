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
        "v-blue": "#328af1",
        "v-blue-hover": "#2879bd",
        "v-yellow": "#ffc73c",
        "v-red": "#ec454f",
        "v-green": "#1aab8b",
        "v-purple": "#8b60ed",
      },
      spacing: {
        2.25: "0.5625rem",
        7.5: "1.875rem",
        22: "5.5rem",
        57: "14.25rem",
        70: "17.5rem",
        76: "19rem",
        88: "22rem",
        104: "26rem",
        175: "43.75rem",
        87.5: "21.875rem",
        125: "31.25rem",
        15: "3.75rem",
        17: "4.25rem",
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
