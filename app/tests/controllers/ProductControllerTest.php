<?php

class ProductControllerTest extends TestCase
{
    public function TearDown()
    {
        Mockery::close();
    }
    
    public function testConstructor()
    {
        $repositoryMock = $this->getRepositoryMock();
        $dispatcherMock = $this->getDispatcherMock();
        $dispatcherMock
            ->shouldReceive("listen")
            ->atLeast()
            ->once()
            ->with(
              "product.store",
              [$repositoryMock, "insert"]
            );
            
        $productController = new ProductController(
            $repositoryMock,
            $this->getValidatorMock(),
            $this->getRespondMock(),
            $dispatcherMock
        );
    }
    
    public function testStore()
    {
        $validatorMock = $this->getValidatorMock();
        $validatorMock
            ->shouldReceive("passes")
            ->atLeast()
            ->once()
            ->with("store")
            ->andReturn(true);
        
        $respondMock = $this->getRespondMock();
        $respondMock
            ->shouldReceive('success')
            ->atLeast()
            ->once()
            ->andReturn($respondMock);
        $respondMock
            ->shouldReceive('json')
            ->atLeast()
            ->once()
            ->andReturn($respondMock);
        
        $dispatcherMock = $this->getDispatcherMock();
        $dispatcherMock
            ->shouldReceive("fire")
            ->atLeast()
            ->once()
            ->with("product.store");
        
        $productController = new ProductController(
            $this->getRepositoryMock(),
            $validatorMock,
            $respondMock,
            $dispatcherMock
        );
        $productController->store();
        //$this->assertInstanceOf("Illuminate\Support\Facades\Response", $productController->store());
    }
    
    protected function getRepositoryMock()
    {
        return Mockery::mock("Mkcommerce\ProductRepositoryInterface")->makePartial();
    }
    
    protected function getValidatorMock()
    {
        return Mockery::mock("Mkcommerce\ProductValidatorInterface")->makePartial();
    }
    
    protected function getRespondMock()
    {
        return Mockery::mock("Mkcommerce\Respond")->makePartial();
    }
    
    protected function getResponseMock()
    {
        return Mockery::mock("Illuminate\Support\Facades\Response")->makePartial();
    }
    
    protected function getDispatcherMock()
    {
        return Mockery::mock("Illuminate\Events\Dispatcher")->makePartial();
    }
}
