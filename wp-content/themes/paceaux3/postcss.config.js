const postcssPresetEnv = require('postcss-preset-env');

module.exports = {
    plugins: [
        postcssPresetEnv({
            browsers: '> 5%',
        }),
        require("postcss-import"),
        ...(process.env.NODE_ENV === "production" ? [require("cssnano")] : []),
    ],
};