module.exports = {

    /**
     * Files should be tag version in development environment.
     */
    versionFiles: [
        'public/css/admin.min.css',
        'public/js/admin.min.js'
    ],

    /**
     * Neccessary fonts should be copy into public.
     */
    fonts: {
        basePath: 'resources/assets',
        bowers: [
            'bootstrap/fonts',
            'font-awesome-4.5.0/fonts',
            'Ionicons-2.0.1/fonts'
        ],
        destinations: [
            'public/build/fonts',
            'public/fonts'
        ],
    },

    /**
     * Neccessary img should be copy into public.
     */
    img: {
        basePath: 'resources/assets',
        bowers: [
            'AdminLTE-2.3.11/dist/img',
        ],
        destination: 'public/img'
    },

    /**
     * Styles configuration.
     */
    styles: {
        basePath: '..',
        bowers: [
            'AdminLTE-2.3.11/bootstrap/css/bootstrap.min.css',
            'font-awesome-4.5.0/css/font-awesome.min.css',
            'Ionicons-2.0.1/css/ionicons.min.css',
            'AdminLTE-2.3.11/dist/css/AdminLTE.min.css',
            'AdminLTE-2.3.11/dist/css/skins/_all-skins.min.css'
        ],
        owners: [
            //
        ],
        destination: 'public/css/admin.min.css'
    },

    /**
     * Scripts configuration.
     */
    scripts: {
        basePath: '..',
        bowers: [
            'AdminLTE-2.3.11/plugins/jQuery/jquery-2.2.3.min.js',
            'AdminLTE-2.3.11/bootstrap/js/bootstrap.min.js',
            'AdminLTE-2.3.11/plugins/slimScroll/jquery.slimscroll.min.js',
            'AdminLTE-2.3.11/plugins/fastclick/fastclick.js',
            'AdminLTE-2.3.11/dist/js/app.min.js',
            'AdminLTE-2.3.11/dist/js/demo.js'
        ],
        owners: [
            //
        ],
        destination: 'public/js/admin.min.js'
    }
};
