<?php

namespace Mkcommerce;

class PricingValidator implements PricingValidatorInterface
{
    public function passes($event)
    {
        return true;
    }
    
    public function messages($event)
    {
        
    }
    
    public function on($event)
    {
        
    }
}