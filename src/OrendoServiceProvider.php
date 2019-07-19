<?php

namespace Orendo\LaravelPackage;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Console\PresetCommand;
use Orendo\LaravelPackage\Acl\AclSetup;
use Orendo\LaravelPackage\Tailwind\Tailwind;

class OrendoServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        if ($this->app->runningInConsole()) {
            $this->commands([
                AclSetup::class,
            ]);
        }

        PresetCommand::macro('tailwind', function ($command) {
            Tailwind::install();

            $command->info('Tailwind scaffolding installed successfully.');
            $command->comment('Please run "npm install && npm run dev" to compile your fresh scaffolding.');
        });

    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
