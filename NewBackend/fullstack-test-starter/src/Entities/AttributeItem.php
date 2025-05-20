<?php

namespace App\Entities;

class AttributeItem
{
    public function __construct(
        public int $id,
        public string $product_id,
        public string $attr_id,
        public string $item_id,
        public string $display_value,
        public string $value,

    ) {
    }
}