const mix = require('laravel-mix');

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

const resources = 'resources';
const assets    = `${resources}/assets`;
const dist      = 'dist';

mix.setPublicPath(dist);
mix.setResourceRoot('../');

// Stylus
mix.sass(`${assets}/styles/main.scss`, `${dist}/styles/main.css`);

// Javascript
mix.js(`${assets}/scripts/main.js`, `${dist}/scripts`);

// Assets
mix.copyDirectory(`${assets}/images`, `${dist}/images`);

// Source maps when not in production.
if (!mix.inProduction()) {
  mix.sourceMaps();
}

// Hash and version files in production.
if (mix.inProduction()) {
  mix.version();
}
