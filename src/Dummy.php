<?php

namespace Facilita\Dummy;

use Facilita\Dummy\Data\ProductData;
use Facilita\Dummy\Services\ProductService;

class Dummy {

    public function product():ProductService
    {
        return new ProductService();
    }

    public function create(ProductData $data){
        
    };
}
