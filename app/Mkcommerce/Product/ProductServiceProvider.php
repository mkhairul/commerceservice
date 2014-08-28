<?php

namespace Mkcommerce;

use Illuminate\Support\ServiceProvider;

class ProductServiceProvider extends ServiceProvider
{
    protected $defer = true;
    
    public function register()
    {
        $this->app->bind(
            "Mkcommerce\\ProductRepositoryInterface",
            "Mkcommerce\\ProductRepository"
        );
        $this->app->bind(
            "Mkcommerce\\ProductValidatorInterface",
            "Mkcommerce\\ProductValidator"
        );
    }
    
    public function provides()
    {
        return array(
            "Mkcommerce\\ProductRepositoryInterface",
            "Mkcommerce\\ValidatorInterface"
        );
    }
}