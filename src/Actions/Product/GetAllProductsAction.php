<?php

namespace Facilita\Dummy\Actions\Product;

use Facilita\Dummy\Data\ProductData;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Lorisleiva\Actions\Concerns\AsAction;

class GetAllProductsAction{
    use AsAction;

    /**
     * Handle the action.
     *
     * @return Collection<ProductData>
     */
    public function handle():Collection
    {
        $products = collect();
        $page = 0;
        do{
            $response = Http::dummy("Buscando todos produtos",[
                'page'=>$page
            ])->get('products',[
                'skip' => $page++ * 30
            ]);
            if($response->json('limit') == 0){
                break;
            }
            $response
            ->collect('products')
            ->each(fn($product)=> $products->push(new ProductData(
                id: $product['id'],
                title: $product['title'],
                description: $product['description'],
            )));
        }while(true);
        return $products;
    }
}