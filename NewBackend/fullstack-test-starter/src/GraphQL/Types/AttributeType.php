<?php

namespace App\GraphQL\Types;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use App\Repositories\ProductRepository;

class AttributeType extends ObjectType
{
    public function __construct()
    {
        parent::__construct([
            'name' => 'Attribute',
            'fields' => function () {
                return [
                    'id' => Type::int(),
                    'product_id' => Type::string(),
                    'attr_id' => Type::string(),
                    'name' => Type::string(),
                    'type' => Type::string(),

                ];
            }
        ]);
    }
}
