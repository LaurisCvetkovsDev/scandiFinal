<?php

namespace App\Entities;

class Price
{
    public function __construct(
        public $id,
        public $product_id,
        public $currency_label,
        public $currency_symbol,
        public $amount,

    ) {
    }
}