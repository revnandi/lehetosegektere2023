let mix = require('laravel-mix');
let path = require('path');

mix.setResourceRoot('../');
mix.setPublicPath(path.resolve('./'));

mix.webpackConfig({
    watchOptions: { ignored: [
        path.posix.resolve(__dirname, './node_modules'),
        path.posix.resolve(__dirname, './css'),
    ] }
});

mix.ts('resources/ts/app.ts', 'js');

mix.postCss("resources/css/app.css", "css");

mix.postCss("resources/css/editor-style.css", "css");

// mix.browserSync({
//     proxy: 'http://tailpress.test',
//     host: 'tailpress.test',
//     open: 'external',
//     port: 8000
// });

if (mix.inProduction()) {
    mix.version();
} else {
    Mix.manifest.refresh = _ => void 0
}
