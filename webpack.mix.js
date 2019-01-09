let mix = require('laravel-mix')
let tailwindcss = require('tailwindcss')
let glob = require('glob-all')
let purgeCss = require('purgecss-webpack-plugin')

mix.js('resources/assets/js/app.js', 'public/js')
    .postCss('resources/assets/css/main.css', 'public/css', [
        tailwindcss('themes/tailwind.js'),
    ])
    .postCss('resources/assets/css/beachybeach.css', 'public/css', [
        tailwindcss('themes/beachybeach.js')
    ])
    .postCss('resources/assets/css/dark-theme.css', 'public/css', [
        tailwindcss('themes/tailwind-dark.js')
    ])
    .postCss('resources/assets/css/ocean-theme.css', 'public/css', [
        tailwindcss('themes/ocean.js')
    ]);

mix.options({
    postCss: [
        require('autoprefixer')({
            grid: true,
            browsers: ['last 2 versions', 'IE 9', 'Safari 9']
        })
    ]
});

if (mix.inProduction()) {
    mix.webpackConfig({
        plugins: [
            new purgeCss({
                paths: glob.sync([
                    path.join(__dirname, 'resources/views/**/*.blade.php'),
                    path.join(__dirname, 'resources/assets/js/**/*.vue')
                ]),
                extractors: [
                    {
                        extractor: class {
                            static extract(content) {
                                return content.match(/[A-z0-9-:\/]+/g)
                            }
                        },
                        extensions: ['html', 'js', 'php', 'vue']
                    }
                ]
            })
        ]
    })
}