<?php

namespace Mkcommerce;

use Illuminate\Support\ServiceProvider;

class ProductServiceProvider extends ServiceProvider
{
    protected $defer = true;

    public function register()
    {
        $this->app->bind(
            "Mkcommerce\\PricingRepositoryInterface",
            "Mkcommerce\\PricingRepository"
        );
        $this->app->bind(
            "Mkcommerce\\PricingValidatorInterface",
            "Mkcommerce\\PricingValidator"
        );
    }

    public function provides()
    {
        return array(
            "Mkcommerce\\PricingRepositoryInterface",
            "Mkcommerce\\ValidatorInterface"
        );
    }
}
