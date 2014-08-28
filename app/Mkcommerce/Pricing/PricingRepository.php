<?php

namespace Mkcommerce;

use Illuminate\Http\Request;
use Str;
use Pricing;

class PricingRepository implements PricingRepositoryInterface
{
    public function __construct(Request $request, Pricing $pricing)
    {
        $this->request = $request;
        $this->pricing = $pricing;
    }
    
    public function all()
    {
        return $this->pricing->all();
    }
    
    public function first(array $modifiers)
    {
        
    }
    
    public function insert()
    {
        $data = array(
        );
        
        return $result = $this->pricing->create($data);
    }
    
    public function update(array $data, array $modifiers)
    {
        
    }
    
    public function delete($id)
    {
        return $this->pricing->find($id)->delete();
    }
}