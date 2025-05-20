<?php
require_once __DIR__ . '/../Database.php';

require_once __DIR__ . '/CategoryRepository.php'; // Adjust the path if needed
require_once __DIR__ . '/../models/Category.php';

// Create the PDO connection
$pdo = Database::getInstance();
$repo = new CategoryRepository($pdo);

// Test object return
$category = $repo->findById('1');
var_dump($category);

// Test array return
$categoryArray = $repo->getById('1');
var_dump($categoryArray);

echo get_class($category);
