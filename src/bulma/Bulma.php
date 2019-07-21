<?php

namespace Orendo\laravelPackage\Bulma;

use Illuminate\Foundation\Console\Presets\Preset as OrendoPreset;
use Illuminate\Support\Facades\File;


class Bulma extends OrendoPreset
{
    public static function install()
    {
        static::updatePackages();
        static::updateScripts();
        static::installBulma();
        static::updateViews();
		    static::installCssAssets();
    }

    public static function updatePackageArray()
    {
        return [
            'cross-env' => '^5.1',
            'laravel-mix' => '^2.0',
            'axios' => '^0.18',
            'vue' => '^2.5.7',
            'vuex' => '^3.0.1',
            'sweetalert' => '^2.1.0',
            'pretty' => '^2.0.0'
        ];
    }

    public static function updateScripts()
    {
        if (File::isDirectory(resource_path('js'))) {
            File::deleteDirectory(resource_path('js'));
        }
		copy(__DIR__ . '/js/webpack.mix.js', base_path('webpack.mix.js'));

		File::copyDirectory(__DIR__ .'/js', resource_path('js'));
    }

    public static function installBulma()
	{
        if (File::isDirectory(resource_path('sass'))) {
            File::deleteDirectory(resource_path('sass'));
        }

		File::copyDirectory(__DIR__ .'/sass', resource_path('sass'));
    }

    public static function updateViews()
    {
        if (File::isDirectory(resource_path('views'))) {
            File::deleteDirectory(resource_path('views'));
        }

        File::copyDirectory(__DIR__ .'/views', resource_path('views'));
    }

    public static function installCssAssets()
    {
		if (File::isDirectory(resource_path('css'))) {
			File::delete(resource_path('css'));
		}

		File::copyDirectory(__DIR__ .'/css', resource_path('css'));
		File::copyDirectory(__DIR__.'/fonts', base_path('public/fonts'));
	}
}
