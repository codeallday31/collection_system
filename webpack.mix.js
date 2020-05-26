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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .styles("node_modules/admin-lte/dist/css/adminlte.min.css", "public/css/adminLTE/main.css")
    .styles(
        [
            "node_modules/admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css",
            "node_modules/admin-lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css",
        ],
        "public/css/datatable/dataTable.css"
    )
    .scripts("node_modules/admin-lte/dist/js/adminlte.min.js", "public/js/adminLTE/main.js")
    .scripts(
        [
            "node_modules/admin-lte/plugins/datatables/jquery.dataTables.min.js",
            "node_modules/admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js",
            "node_modules/admin-lte/plugins/datatables-responsive/js/dataTables.responsive.min.js",
            "node_modules/admin-lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"
        ],
        "public/js/datatable/dataTable.js"
    )
    // .copy("node_modules/admin-lte/plugins/fontawesome-free", "public/plugins/fontawesome-free")
    // .copy("node_modules/admin-lte/plugins/toastr", "public/plugins/toastr")
    
    // .copy("node_modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js", "js/bootstrap-timepicker/bootstrap-timepicker.js")
    .version();