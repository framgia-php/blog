const elixir = require('laravel-elixir');
const asset = require('./npm/asset');
const adminAsset = require('./npm/assets/admin');
const sitesAsset = require('./npm/assets/sites');

elixir(mix => {
    mix.copy('resources/assets/bowers/Ionicons-2.0.1/png', 'public/build/png');

    asset.setMix(mix)
        .copyFonts(adminAsset)
        .copyImg(adminAsset)
        .compileStyles(adminAsset)
        .compileScripts(adminAsset)
        .makeVersion(adminAsset)
        .copyFonts(sitesAsset)
        .compileStyles(sitesAsset)
        .compileScripts(sitesAsset)
        .makeVersion(sitesAsset);
});
