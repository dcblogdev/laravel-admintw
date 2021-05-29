module.exports = {
  purge: {
        content: [
            './app/**/*.php',
            './resources/**/*.html',
            './resources/**/*.js',
            './resources/**/*.php',
        ],
        options: {
            defaultExtractor: (content) => content.match(/[\w-/.:]+(?<!:)/g) || [],
            whitelistPatterns: [/-active$/, /-enter$/, /-leave-to$/, /show$/],
        },
    },
  darkMode: 'media',
  theme: {
    extend: {
        boxShadow: {
            xs: '0 0 0 1px rgba(0, 0, 0, 0.05)',
            outline: '0 0 0 3px rgba(66, 153, 225, 0.5)',
        }
    },
  },
  variants: {
    cursor: ['responsive', 'disabled'],
    fontWeight: ['responsive', 'hover', 'focus', 'active', 'group-hover', 'dark'],
    opacity: ['responsive', 'hover', 'focus', 'disabled', 'dark'],
    textColor: ['responsive', 'hover', 'focus', 'disabled', 'group-hover', 'focus-within', 'dark'],
    borderColor: ['responsive', 'hover', 'focus', 'disabled', 'last', 'group-hover', 'focus-within', 'dark'],
    borderWidth: ['responsive', 'last'],
    boxShadow: ['responsive', 'hover', 'focus', 'active', 'group-hover', 'dark'],
    backgroundOpacity: ['responsive', 'hover', 'focus', 'active', 'disabled', 'group-hover', 'dark'],
    backgroundColor: ['responsive', 'hover', 'disabled', 'focus', 'odd', 'even', 'checked', 'dark'],
    placeholderColor: ['responsive', 'focus', 'disabled', 'dark'],
    margin: ['responsive', 'hover', 'focus', 'first'],
    zIndex: ['hover', 'active'],
  },
  plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
    ],
}
