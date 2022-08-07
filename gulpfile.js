const elixir = require('laravel-elixir')

require('laravel-elixir-vue-2')
elixir.config.sourcemaps = false

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(mix => {
  mix.sass(
    'admin/main.scss',
    'public/admin/css/main.css')

  mix.scripts(
    'admin/main.js',
    'public/admin/js/main.js')

  mix.browserSync({
    files: [ 'app/Http/Controllers/**/*', 'resources/views/**/*', 'routes/web.php', 'public/**/*', '!public/**.map' ],
    online: false,
    proxy: 'localhost:8000'
  })
})
