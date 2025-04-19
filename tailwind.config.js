// tailwind.config.js
module.exports = {
    content: [
        './resources/**/*.vue',
        './resources/**/*.blade.php',
    ],
    theme: {
        extend: {
            colors: {
                'space-black': '#0A0E17',
                'space-deep': '#1A0A2E',
                'nasa-blue': '#2A2356',
                'nasa-teal': '#4ECDC4',
                'mars-orange': '#E2711D',
                'space-border': '#2E2746',
                'space-surface': '#160D2C',
            },
            rotate: {
                '15': '15deg',
            },
            perspective: {
                '1000': '1000px',
            }
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
    ],
}
