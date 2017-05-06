module.exports = {

    /**
     * set mix object from laravel-elixir.
     */
    setMix(mix) {
        this.mix = mix;

        return this;
    },

    /**
     * Resolve all paths of sources by asset and type ('style', 'scripts', ...)
     */
    resolveSources (asset, type) {
        var sources = [];

        for (var i = 0; i < asset[type].bowers.length; i++) {
            var path = asset[type].bowers[i];

            path = asset[type].basePath + '/bowers/' + path;

            sources.push(path);
        }

        return sources;
    },

    /**
     * Compile asset.
     */
    compileAsset (asset, type) {
        if (type === 'styles') {
            this.mix.styles(
                this.resolveSources(asset, type),
                asset[type].destination
            );
        } else if (type === 'scripts') {
            this.mix.scripts(
                this.resolveSources(asset, type),
                asset[type].destination
            )
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
     * Make version for files.
     */
    makeVersion (asset) {
        this.mix.version(asset.versionFiles);

        return this;
    },
}
