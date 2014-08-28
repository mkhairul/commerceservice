<?php
use Mkcommerce\ProductRepositoryInterface;
use Mkcommerce\ProductValidatorInterface;
use Illuminate\Support\Facades\Response;
use Illuminate\Events\Dispatcher;
use Mkcommerce\Respond;

class ProductController extends BaseController
{
    public function __construct(
        ProductRepositoryInterface $repository,
        ProductValidatorInterface $validator,
        Respond $respond,
        Dispatcher $dispatcher
    )
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->respond = $respond;
        $this->dispatcher = $dispatcher;
        
        $this->dispatcher->listen(
            "product.store",
            array($this->repository, "insert")
        );
        
    }
    
    public function store()
    {
        if($this->validator->passes("store"))
        {
            $this->dispatcher->fire("product.store");
            return $this->respond->success()->json();
        }
        
        return $this->respond->fail()->json();
    }
    
    public function retrieve($id='')
    {
        return $this->respond->message($this->repository->all())->json();
    }
    
    public function remove($id)
    {
        $result = $this->repository->delete($id);
        if($result)
        {
            return $this->respond->message($result)->success()->json();
        }
        else
        {
            return $this->respond->message($result)->fail()->json();
        }
    }
}