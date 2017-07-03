module.exports = {

    /**
     * set mix object from laravel-elixir.
     */
    setMix(mix) {
        this.mix = mix;

        return this;
    },

    resolveSourcesByResource (asset, type) {

    },

    /**
     * Resolve all paths of sources by asset and type ('style', 'scripts', ...)
     */
    resolveSources (asset, type) {
        var sources = [];

        if (asset[type].bowers !== undefined) {
            for (var i in asset[type].bowers) {
                var path = asset[type].bowers[i];

                path = asset[type].basePath + '/bowers/' + path;

                sources.push(path);
            }
        }

        if (asset[type].owners !== undefined) {
            for (var i in asset[type].owners) {
                var path = asset[type].owners[i];

                path = asset[type].ownerPath + '/' + path;

                sources.push(path);
            }
        }

        if (asset[type].public !== undefined) {
            for (var i in asset[type].public) {
                var path = asset[type].publicPath + '/' + asset[type].public[i];

                sources.push(path);
            }
        }

        return sources;
    },

    /**
     * Compile asset.
     */
    compileAsset (asset, type) {
        // return console.log(asset[type]);
        var sources = this.resolveSources(asset, type);
        var destination = asset[type].destination;

        if (type === 'styles') {
            this.mix.styles(sources, destination);
        } else if (type === 'scripts') {
            this.mix.scripts(sources, destination);
        } else if (type === 'sass') {
            this.mix.sass(sources, destination);
        }

        return this;
    },

    /**
     * Copy asset.
     */
    copyAsset(asset, type) {
        var sources = this.resolveSources(asset, type);

        if (asset[type].destinations !== undefined) {
            var destinations = asset[type].destinations;

            for (var i = 0; i < destinations.length; i++) {
                var destination = destinations[i];

                this.mix.copy(sources, destination);
            }
        } else if (asset[type].destination !== undefined) {
            var destination = asset[type].destination;

            this.mix.copy(sources, destination);
        }

        return this;
    },

    /**
     * Copy fonts.
     */
    copyFonts (asset) {
        return this.copyAsset(asset, 'fonts');
    },

    /**
     * Copy img.
     */
    copyImg (asset) {
        return this.copyAsset(asset, 'img');
    },

    /**
     * Compile all styles files of asset.
     */
    compileStyles (asset) {
        return this.compileAsset(asset, 'styles');
    },

    /**
     * Compile all scripts files of asset.
     */
    compileScripts (asset) {
        return this.compileAsset(asset, 'scripts');
    },

    /**
     * Compile all sass files of asset.
     */
    compileSass (asset) {
        return this.compileAsset(asset, 'sass');
    },

    /**
     * Make version for files.
     */
    makeVersion (asset) {
        this.mix.version(asset.versionFiles);

        return this;
    },
}
