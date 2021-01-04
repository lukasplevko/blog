const mix = require("laravel-mix");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js("resources/js/app.js", "public/js").sass(
    "resources/sass/app.scss",
    "public/css"
);
mix.sass("resources/sass/style.scss", "public/css");
mix.js(["resources/js/admin/admin.js"], "public/js").sass(
    "resources/sass/admin/admin.scss",
    "public/css"
);
mix.browserSync("127.0.0.1:8000");
if (mix.inProduction()) {
    mix.version();
}
