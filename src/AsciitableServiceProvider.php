<?php

namespace Tridcatij\Asciitables;

use Illuminate\Support\ServiceProvider;
use App;

class AsciitableServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        App::bind('asciitable', function()
            {
                return new AsciitableController;
            }
        );
    }
}
