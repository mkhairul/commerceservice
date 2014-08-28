<?php

namespace Mkcommerce;

interface PricingRepositoryInterface
{
    public function all();
    public function first();
    public function insert();
    public function update(array $data, array $modifiers);
    public function delete($id);
}