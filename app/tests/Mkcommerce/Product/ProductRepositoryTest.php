<?php

namespace Mkcommerce;

use Mockery;
use TestCase;

class ProductRepositoryTest extends TestCase
{
    public function tearDown()
    {
        Mockery::close();
    }
    
    public function testSend()
    {
        $requestMock = $this->getRequestMock();
        
        $requestMock
            ->shouldReceive("get")
            ->atLeast()
            ->once()
            ->with("name");
        
        $requestMock
            ->shouldReceive("get")
            ->atLeast()
            ->once()
            ->with("slug");
        
        $requestMock
            ->shouldReceive("get")
            ->atLeast()
            ->once()
            ->with("description");
            
        $requestMock
            ->shouldReceive("get")
            ->atLeast()
            ->once()
            ->with("shortDescription");
            
        $requestMock
            ->shouldReceive("get")
            ->atLeast()
            ->once()
            ->with("metaDescription");
            
        $requestMock
            ->shouldReceive("get")
            ->atLeast()
            ->once()
            ->with("metaKeywords");
            
        $productModelMock = $this->getProductModel();
        $productModelMock
            ->shouldReceive("create")
            ->atLeast()
            ->once();
        
        $productRepository = new ProductRepository($requestMock, $productModelMock);
        $productRepository->insert();
    }
    
    protected function getRequestMock()
    {
        return Mockery::mock("Illuminate\Http\Request");
    }
    
    protected function getProductModel()
    {
        return Mockery::mock("Product");
    }
}
