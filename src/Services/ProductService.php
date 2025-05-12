<?php

namespace Facilita\Dummy\Services;

use Facilita\Dummy\Actions\Product\GetAllProductsAction;
use Illuminate\Support\Collection;

class ProductService{
    /**
     * @return Collection<ProductData>
     */
    public function all():Collection
    {
        return GetAllProductsAction::run();
    }
}