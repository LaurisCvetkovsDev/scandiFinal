<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: X-Requested-With,Authorization,Content-Type');
header('Access-Control-Max-Age: 86400');

ini_set('display_errors', 1);
error_reporting(E_ALL);

if (strtolower($_SERVER['REQUEST_METHOD']) == 'options') {
    exit();
}

require_once __DIR__ . '/../Database.php';
require_once __DIR__ . '/../repositories/AttributeRepository.php';
require_once __DIR__ . '/../repositories/ProductRepository.php';
require_once __DIR__ . '/../repositories/CategoryRepository.php';
require_once __DIR__ . '/../repositories/PriceRepository.php';
require_once __DIR__ . '/../repositories/GalleryRepository.php';

header('Content-Type: application/json');

$dbConn = Database::getInstance();

$productRepo = new ProductRepository($dbConn);
$categoryRepo = new CategoryRepository($dbConn);
$priceRepo = new PriceRepository($dbConn);
$imageRepo = new GalleryRepository($dbConn);

$products = $productRepo->getAll();

$output = array_map(function ($product) use ($priceRepo, $imageRepo) {
    $prices = $priceRepo->getByProductId($product['id']);
    $images = $imageRepo->getByProductId($product['id']);

    return [
        'id' => $product['id'],
        'name' => $product['name'],
        'inStock' => (bool) $product['inStock'],
        'category' => $product['category'], // just use already loaded category
        'prices' => array_map(function ($price) {
            return [
                'currencyLabel' => $price['currency_label'],
                'currencySymbol' => $price['currency_symbol'],
                'amount' => $price['amount']
            ];
        }, $prices),
        'gallery' => array_map(function ($image) {
            return ['url' => $image['image_url']];
        }, $images)
    ];
}, $products);

echo json_encode($output);

