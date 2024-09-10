/** @type {import('tailwindcss').Config} */
export default {
    content: ["./resources/**/*.blade.php", "./resources/**/*.js"],
    theme: {
        extend: {
            fontFamily: {
                Poppins: ["Poppins", "sans-serif"],
            },
        },
    },
    plugins: [],
};
