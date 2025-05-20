<?php

namespace App\Entities;

class Image
{
    public function __construct(
        public int $id,
        public string $image_url,
        public string $product_id,

    ) {
    }
}