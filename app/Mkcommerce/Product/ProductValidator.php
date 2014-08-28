<?php

namespace Mkcommerce;

class ProductValidator implements ProductValidatorInterface
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