const elixir = require('laravel-elixir');

const ASSETS_PATH = 'resources/assets/';
const BOWERS_PATH = ASSETS_PATH + 'bowers/';
const STYLES_PATH = '../';
const SCRIPTS_PATH = '../';
const BASE_PATH_FROM_ASSETS = '../../../';

elixir(mix => {
    /**
     * All admin assets tasks.
     */
    mix.copy(BOWERS_PATH + 'Ionicons-2.0.1/png', 'public/png');

    mix.copy(BOWERS_PATH + 'AdminLTE-2.3.11/dist/img', 'public/img');

    mix.copy([
        BOWERS_PATH + 'bootstrap/fonts',
        BOWERS_PATH + 'font-awesome-4.5.0/fonts',
        BOWERS_PATH + 'Ionicons-2.0.1/fonts',
    ], 'public/fonts');

    mix.sass('admin/styles.scss', 'public/css/admin_styles_scss.css');

    mix.styles([
        STYLES_PATH + 'bowers/AdminLTE-2.3.11/bootstrap/css/bootstrap.min.css',
        STYLES_PATH + 'bowers/font-awesome-4.5.0/css/font-awesome.min.css',
        STYLES_PATH + 'bowers/Ionicons-2.0.1/css/ionicons.min.css',
        STYLES_PATH + 'bowers/AdminLTE-2.3.11/dist/css/AdminLTE.min.css',
        STYLES_PATH + 'bowers/AdminLTE-2.3.11/dist/css/skins/_all-skins.min.css',
        BASE_PATH_FROM_ASSETS + 'public/css/admin_styles_scss.css'
    ], 'public/css/admin.min.css');

    mix.scripts([
        SCRIPTS_PATH + 'bowers/AdminLTE-2.3.11/plugins/jQuery/jquery-2.2.3.min.js',
        SCRIPTS_PATH + 'bowers/AdminLTE-2.3.11/bootstrap/js/bootstrap.min.js',
        SCRIPTS_PATH + 'bowers/AdminLTE-2.3.11/plugins/slimScroll/jquery.slimscroll.min.js',
        SCRIPTS_PATH + 'bowers/AdminLTE-2.3.11/plugins/fastclick/fastclick.js',
        SCRIPTS_PATH + 'bowers/AdminLTE-2.3.11/dist/js/app.min.js',
        SCRIPTS_PATH + 'bowers/AdminLTE-2.3.11/dist/js/demo.js'
    ], 'public/js/admin.min.js');

    /**
     * All sites assets tasks.
     */
    mix.sass('sites/styles.scss', 'public/css/sites_styles_scss.css');

    mix.copy([
        'resources/assets/bowers/bootstrap-3.3.7/dist/fonts',
        'resources/assets/bowers/font-awesome-4.6.0/fonts'
    ], 'public/fonts');

    mix.styles([
        STYLES_PATH + 'bowers/bootstrap-3.3.7/dist/css/bootstrap.min.css',
        STYLES_PATH + 'bowers/font-awesome-4.6.0/css/font-awesome.min.css',
        STYLES_PATH + 'bowers/select2-4.0.3/dist/css/select2.min.css',
        STYLES_PATH + 'bowers/toastr-2.1.3/toastr.min.css',
        BASE_PATH_FROM_ASSETS + 'public/css/sites_styles_scss.css',
    ], 'public/css/sites.min.css');

    mix.scripts([
        SCRIPTS_PATH + 'bowers/jquery-3.2.1/dist/jquery.min.js',
        SCRIPTS_PATH + 'bowers/bootstrap-3.3.7/dist/js/bootstrap.min.js',
        SCRIPTS_PATH + 'bowers/select2-4.0.3/dist/js/select2.full.min.js',
        SCRIPTS_PATH + 'bowers/toastr-2.1.3/toastr.min.js',
        'sites/comments.js'
    ], 'public/js/sites.min.js');

    /**
     * Copy asset in root public into public/build during development time.
     */
    mix.copy('public/fonts', 'public/build/fonts');
    mix.copy('public/img', 'public/build/img');
    mix.copy('public/png', 'public/build/png');

    /**
     * Make versions of all files.
     */
    mix.version([
        'public/css/admin.min.css',
        'public/js/admin.min.js',
        'public/css/sites.min.css',
        'public/js/sites.min.js'
    ]);
});
