let mix = require('laravel-mix');
var tailwindcss = require('tailwindcss');

mix.js('resources/assets/js/app.js', 'public/js')
   .postCss('resources/assets/css/main.css', 'public/css', [
        tailwindcss('tailwind.js'),
   ]);

// If you want to use LESS for your preprocessing
// mix.less('resources/assets/less/main.less', 'public/css')
//   .options({
//     postCss: [
//       tailwindcss('./tailwind.js'),
//     ]
//   })

// If you want to use SASS for preprocessing
// mix.sass('resources/assets/sass/app.scss', 'public/css')
//    .options({
//       processCssUrls: false,
//       postCss: [ tailwindcss('tailwind.js') ],
//    });
