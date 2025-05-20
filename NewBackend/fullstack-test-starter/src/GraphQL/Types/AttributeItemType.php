<?php

namespace App\GraphQL\Types;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use App\Repositories\ProductRepository;

class AttributeItemType extends ObjectType
{
    public function __construct()
    {
        parent::__construct([
            'name' => 'Item',
            'fields' => function () {
                return [
                    'id' => Type::int(),
                    'product_id' => Type::string(),
                    'attr_id' => Type::string(),
                    'item_id' => Type::string(),
                    'value' => Type::string(),
                    'display_value' => Type::string(),

                ];
            }
        ]);
    }
}
