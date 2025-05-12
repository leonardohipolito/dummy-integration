<?php


namespace Facilita\Dummy\Data;

use Spatie\LaravelData\Attributes\Validation\Rule;
use Spatie\LaravelData\Data;

class ProductData extends Data
{
    public function __construct(
        #[Rule('min:1')]
        public int $id,
        public string $title,
        public string $description,
    ) {
    }
}