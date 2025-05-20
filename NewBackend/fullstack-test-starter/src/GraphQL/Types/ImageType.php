<?php

namespace App\GraphQL\Types;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use App\Repositories\ProductRepository;

class ImageType extends ObjectType
{
    public function __construct()
    {
        parent::__construct([
            'name' => 'Image',
            'fields' => function () {
                return [
                    'id' => Type::int(),
                    'product_id' => Type::string(),
                    'image_url' => Type::string(),

                ];
            }
        ]);
    }
}
