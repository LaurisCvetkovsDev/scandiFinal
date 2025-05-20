<?php

namespace App\Entities;

class Attributes
{
    public function __construct(
        public string $product_id,
        public int $id,
        public string $attr_id,
        public string $name,
        public string $type,

    ) {
    }
}