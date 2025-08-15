<?php

namespace ShamiTheWebdeveloper\LaravelForms;

use Illuminate\Support\ServiceProvider;

class FormServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Register class in Laravel's container
        $this->app->singleton('laravel-forms', function () {
            return new Form();
        });
    }

    public function boot()
    {
        // Package boot logic (optional)
    }
}
