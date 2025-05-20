<?php

namespace App\GraphQL\Types;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use App\Repositories\ProductRepository;

class PriceType extends ObjectType
{
    public function __construct()
    {
        parent::__construct([
            'name' => 'Price',
            'fields' => function () {
                return [
                    'id' => Type::int(),
                    'product_id' => Type::string(),
                    'currency_label' => Type::string(),
                    'currency_symbol' => Type::string(),
                    'amount' => Type::float(),
                ];
            }
        ]);
    }
}
