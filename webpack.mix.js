const webpack = require('webpack');
const path = require('path');
const mix = require('laravel-mix');

let tailwindcss = require('tailwindcss')
let glob = require('glob-all')
let purgeCss = require('purgecss-webpack-plugin')

mix.js('resources/assets/js/app.js', 'public/js')
    .postCss('resources/assets/css/beachybeach.css', 'public/css', [
        tailwindcss('themes/beachybeach.js') 
    ]);

mix.options({
    postCss: [
        require('autoprefixer')({
            grid: true,
            browsers: ['last 2 versions', 'IE 9', 'Safari 9']
        })
    ]
});

mix.webpackConfig({
    resolve: {
        alias: {
            'jquery$': path.resolve(path.join(__dirname, 'node_modules', 'jquery')),
        }
    },
    plugins: [
        new webpack.ProvidePlugin({    
            jQuery: 'jquery',
            $: 'jquery',
            'window.jQuery': 'jquery',
        }),
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
