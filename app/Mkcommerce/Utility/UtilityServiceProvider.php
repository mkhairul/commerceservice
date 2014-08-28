<?php

namespace Mkcommerce;

use Illuminate\Support\ServiceProvider;

class UtilityServiceProvider extends ServiceProvider
{
    protected $defer = true;
    
    public function register()
    {
        $this->app->bind(
            "Mkcommerce\\RespondInterface",
            "Mkcommerce\\Respond"
        );
    }
    
    public function provides()
    {
        return array(
            "Mkcommerce\\RespondInterface"
        );
    }
}