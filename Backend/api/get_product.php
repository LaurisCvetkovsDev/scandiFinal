<?php
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit();
}

if (!isset($_GET['id'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Product ID is required']);
    exit;
}

require_once __DIR__ . '/../Database.php';
require_once __DIR__ . '/../repositories/ProductRepository.php';

$productId = $_GET['id'];

$dbConn = Database::getInstance();
$productRepo = new ProductRepository($dbConn);

$product = $productRepo->findById($productId);

if (!$product) {
    http_response_code(404);
    echo json_encode(['error' => 'Product not found']);
    exit;
}

echo json_encode($product);
