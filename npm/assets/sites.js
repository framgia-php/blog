module.exports = {

    /**
     * Files should be tag version in development environment.
     */
    versionFiles: [
        'public/css/sites.min.css',
        'public/js/sites.min.js'
    ],

    /**
     * Neccessary fonts should be copy into public.
     */
    fonts: {
        basePath: 'resources/assets',
        ownerPath: 'resources/assets/sites',
        bowers: [
            'resources/assets/bowers/bootstrap/dist/fonts',
            'resources/assets/bowers/font-awesome/fonts'
        ],
        owners: [
        ],
        destinations: [
            'public/build/fonts',
            'public/fonts'
        ],
    },

    /**
     * Styles configuration.
     */
    styles: {
        basePath: '..',
        ownerPath: '../sites/css',
        bowers: [
            'bootstrap-3.3.7/dist/css/bootstrap.min.css',
            'font-awesome-4.6.0/css/font-awesome.min.css',
            'select2-4.0.3/dist/css/select2.min.css'
        ],
        owners: [
            'styles.css'
        ],
        destination: 'public/css/sites.min.css'
    },

    /**
     * Scripts configuration.
     */
    scripts: {
        basePath: '..',
        ownerPath: '../sites/js',
        bowers: [
            'jquery-3.2.1/dist/jquery.min.js',
            'bootstrap-3.3.7/dist/js/bootstrap.min.js',
            'select2-4.0.3/dist/js/select2.full.min.js'
        ],
        owners: [
            //
        ],
        destination: 'public/js/sites.min.js'
    }
};
