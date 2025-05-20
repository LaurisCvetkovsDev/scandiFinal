<?php

namespace App\GraphQL\Types;

use GraphQL\Type\Definition\Type;

class TypeRegistry
{
    private static array $types = [];

    public static function product(): Type
    {
        return self::$types['product'] ??= new ProductType();
    }

    public static function price(): Type
    {
        return self::$types['price'] ??= new PriceType();
    }

    public static function image(): Type
    {
        return self::$types['image'] ??= new ImageType();
    }

    public static function attribute(): Type
    {
        return self::$types['attribute'] ??= new AttributeType();
    }

    public static function item(): Type
    {
        return self::$types['item'] ??= new AttributeItemType();
    }
}
