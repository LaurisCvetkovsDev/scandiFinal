<?php

namespace App\GraphQL\Resolvers;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use App\GraphQL\Types\TypeRegistry;
use App\Repositories\ProductRepository;

class QueryResolver extends ObjectType
{
    public function __construct()
    {
        parent::__construct([
            'name' => 'Query',
            'fields' => [
                'product' => [
                    'type' => TypeRegistry::product(),
                    'args' => [
                        'id' => Type::nonNull(Type::id())
                    ],
                    'resolve' => function ($root, $args) {
                        $repo = new ProductRepository();
                        return $repo->getById((int) $args['id']);
                    }
                ],
                'products' => [
                    'type' => Type::listOf(TypeRegistry::product()),
                    'resolve' => function () {
                        $repo = new ProductRepository();
                        return $repo->getAll(); // Make sure getAll returns full hydrated products
                    }
                ]
            ]
        ]);
    }
}
