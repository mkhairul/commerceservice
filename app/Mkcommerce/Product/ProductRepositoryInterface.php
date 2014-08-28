<?php

namespace Mkcommerce;

interface ProductRepositoryInterface
{
    public function all();
    public function first(array $modifiers);
    public function insert();
    public function update(array $data, array $modifiers);
    public function delete($id);
}