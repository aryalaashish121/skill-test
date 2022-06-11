const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js').vue()
    .postCss('resources/css/app.css', 'public/css', [
        require('tailwindcss'),
    ])
    .webpackConfig(require('./webpack.config'))

if (mix.inProduction()) {
    mix.version()
        .extract([
            'vue', 'axios', '@inertiajs/inertia', '@inertiajs/inertia-vue3'
        ])
}