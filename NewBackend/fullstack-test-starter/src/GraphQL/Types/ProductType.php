<?php

namespace App\GraphQL\Types;

use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ObjectType;
use App\Entities\Product;
use App\GraphQL\Types\TypeRegistry;

class ProductType extends ObjectType
{
    public function __construct()
    {
        parent::__construct([
            'name' => 'Product',
            'fields' => function () {
                return [
                    'id' => Type::nonNull(Type::id()),
                    'name' => Type::nonNull(Type::string()),
                    'in_stock' => Type::nonNull(Type::int()),
                    'description' => Type::string(),
                    'category' => Type::string(),
                    'brand' => Type::string(),
                    'prices' => Type::listOf(TypeRegistry::price()),
                    'images' => Type::listOf(TypeRegistry::image()),
                    'attributes' => Type::listOf(TypeRegistry::attribute()),
                    'items' => Type::listOf(TypeRegistry::item()),
                ];
            },
        ]);
    }
}
