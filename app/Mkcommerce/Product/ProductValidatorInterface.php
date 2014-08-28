<?php

namespace Mkcommerce;

interface ProductValidatorInterface
{
    public function passes($event);
    public function messages($event);
    public function on($event);
}