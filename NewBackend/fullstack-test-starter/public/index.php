<?php

require_once __DIR__ . '/../vendor/autoload.php';

use GraphQL\GraphQL;
use GraphQL\Error\DebugFlag;
use GraphQL\Server\StandardServer;

$schema = require __DIR__ . '/../src/GraphQL/schema.php';

$server = new StandardServer([
    'schema' => $schema,
    'debugFlag' => DebugFlag::INCLUDE_DEBUG_MESSAGE | DebugFlag::INCLUDE_TRACE,
]);

$server->handleRequest();
