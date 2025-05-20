<?php

use GraphQL\Type\Schema;
use App\GraphQL\Types\TypeRegistry;
use App\GraphQL\Resolvers\QueryResolver;

return new Schema([
    'query' => new QueryResolver()
]);
