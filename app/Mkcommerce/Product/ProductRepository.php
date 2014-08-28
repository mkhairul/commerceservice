<?php

namespace Mkcommerce;

use Illuminate\Http\Request;
use Str;
use Product;

class ProductRepository implements ProductRepositoryInterface
{
    public function __construct(Request $request, Product $product)
    {
        $this->request = $request;
        $this->product = $product;
    }

    public function all()
    {
        return $this->product->all();
    }

    public function first(array $modifiers)
    {

    }

    public function insert()
    {
        $data = array(
            "name" => $this->request->get("name"),
            "slug" => $this->request->get("slug"),
            "description" => $this->request->get("description"),
            "shortDescription" => $this->request->get("shortDescription"),
            "metaDescription" => $this->request->get("metaDescription"),
            "metaKeywords" => $this->request->get("metaKeywords")
        );
        $result = $this->product->create($data);
    }

    public function update(array $data, array $modifiers)
    {

    }

    public function delete($id)
    {
        return $this->product->find($id)->delete();
    }
}
