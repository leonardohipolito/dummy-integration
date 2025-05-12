<?php

use Facilita\Dummy\Actions\Product\GetAllProductsAction;
use Illuminate\Support\Facades\Queue;

it('get all products from api',function(){
    $result = GetAllProductsAction::run();
    expect($result)->toHaveCount(194);
});

it('excute as job',function(){
    Queue::fake();
    GetAllProductsAction::dispatch();
    GetAllProductsAction::assertPushed();
});