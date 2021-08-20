const mix = require('laravel-mix');


mix.override(config => {
    // Apply a workaround caused by Laravel Mix using the `webpack-dev-server@v4.0.0-beta`:
    // https://github.com/webpack/webpack-dev-server/releases/tag/v4.0.0-beta.3.
    // Basically the `dev` property has been deprecated in favor of `devMiddleware`.
    if (config.devServer) {
        config.devServer.devMiddleware = config.devServer.dev;
        delete config.devServer.dev;
    }
});

mix.js('resources/js/app.js', 'public/js').vue().postCss('resources/css/app.css', 'public/css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
]);