<?php

namespace fmelchor\perfiles;

use Illuminate\Support\ServiceProvider;

class CreatePerfilesProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->loadViewsFrom(__DIR__.'/Views/Profile','profiles');
        $this->loadViewsFrom(__DIR__.'/Views/Comun','comun');
        $this->publishes([
            __DIR__ . '/migrations' => $this->app->databasePath() . '/migrations'
        ], 'migrations');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('fmelchor\perfiles\Controllers\PerfilController');
        $this->app->make('fmelchor\perfiles\Models\Cmodule');
        $this->app->make('fmelchor\perfiles\Models\Coperation');
        $this->app->make('fmelchor\perfiles\Models\Cprofile');
        $this->app->make('fmelchor\perfiles\Models\CprofileOperation');
    }
}
