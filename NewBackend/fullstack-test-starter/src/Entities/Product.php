<?php

namespace App\Entities;

class Product
{
    public function __construct(
        public $id,
        public $name,
        public $in_stock,
        public $description,
        public $category,
        public $brand,
        public array $prices = [],
        public array $images = [],
        public array $attributes = [],
        public array $items = []
    ) {
    }
}