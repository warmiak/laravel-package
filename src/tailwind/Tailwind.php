<?php

namespace Orendo\LaravelPackage\Tailwind;

use Illuminate\Foundation\Console\Presets\Preset as OrendoPreset;
use Illuminate\Support\Facades\File;


class Tailwind extends OrendoPreset
{
    public static function install()
    {
        static::cleanSassFolder();
        static::updatePackages();
        static::updateMix();
        static::updateScripts();
        static::installTailwind();
        static::updateViews();
        static::installMaterialDesignIcons();
    }

    public static function cleanSassFolder()
    {
        File::cleanDirectory(resource_path('assets/sass'));
    }

    public static function updatePackageArray()
    {
        return [
            'cross-env' => '^5.1',
            'laravel-mix' => '^2.0',
            'axios' => '^0.18',
            'vue' => '^2.5.7',
            'vuex' => '^3.0.1',
            'tailwindcss' => '^0.5.3',
            'sweetalert' => '^2.1.0',
            'pretty' => '^2.0.0'
        ];
    }

    public static function updateMix()
    {
        copy(__DIR__ . '/js/webpack.mix.js', base_path('webpack.mix.js'));
    }

    public static function updateScripts()
    {
        copy(__DIR__ . '/js/app.js', resource_path('assets/js/app.js'));
        copy(__DIR__ . '/js/admin.js', resource_path('assets/js/admin.js'));
        copy(__DIR__ . '/js/bootstrap.js', resource_path('assets/js/bootstrap.js'));
        copy(__DIR__. '/js/emmet.js', resource_path('assets/js/emmet.js'));

        File::copyDirectory(__DIR__.'/js/components', resource_path('js/components'));
        File::copyDirectory(__DIR__.'/js/store', resource_path('js/store'));
    }

    public static function installTailwind()
    {
        if (!File::isDirectory(resource_path('less'))) {
            File::makeDirectory(resource_path('less'));
        }

        copy(__DIR__ . '/less/app.less', resource_path('less/app.less'));
        copy(__DIR__ . '/js/tailwind.js', base_path('tailwind.js'));
    }

    public static function updateViews()
    {
        if (File::isDirectory(resource_path('views/layouts'))) {
            File::deleteDirectory(resource_path('views/layouts'));
        }

        if (File::isDirectory(resource_path('views/auth'))) {
            File::deleteDirectory(resource_path('views/auth'));
        }

        if (File::isDirectory(resource_path('views/profile'))) {
            File::deleteDirectory(resource_path('views/profile'));
        }

        if (File::exists(resource_path('views/welcome.blade.php'))) {
            File::delete(resource_path('views/welcome.blade.php'));
        }

        if (File::exists(resource_path('views/home.blade.php'))) {
            File::delete(resource_path('views/home.blade.php'));
        }

        File::copyDirectory(__DIR__.'/views', resource_path('views'));
    }

    public static function installMaterialDesignIcons()
    {
        if (!File::isDirectory(resource_path('css'))) {
            File::makeDirectory(resource_path('css'));
        }

        if (File::exists(resource_path('css/materialdesignicons.css'))) {
            File::delete(resource_path('css/materialdesignicons.css'));
        }

        copy(__DIR__ . '/css/materialdesignicons.css', resource_path('css/materialdesignicons.css'));

        File::copyDirectory(__DIR__.'/fonts', base_path('public/fonts'));
    }
}
