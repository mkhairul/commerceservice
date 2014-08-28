<?php

namespace Mkcommerce;

interface PricingValidatorInterface
{
    public function passes($event);
    public function messages($event);
    public function on($event);
}