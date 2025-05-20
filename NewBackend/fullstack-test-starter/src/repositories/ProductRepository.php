<?php

namespace App\Repositories;

use PDO;
use App\Config\Database;
use App\Entities\Product;
use App\Repositories\PriceRepository;
// Assuming you’ll add these repositories later
use App\Repositories\ImageRepository;
use App\Repositories\AttributeRepository;
use App\Repositories\ItemRepository;

class ProductRepository
{
    private PDO $db;
    private PriceRepository $priceRepo;
    private GalleryRepository $imageRepo;
    private AttributeRepository $attributeRepo;
    private AttributeItemRepository $itemRepo;

    public function __construct()
    {
        $this->db = Database::getInstance();
        $this->priceRepo = new PriceRepository();
        $this->imageRepo = new GalleryRepository();
        $this->attributeRepo = new AttributeRepository();
        $this->itemRepo = new AttributeItemRepository();
    }

    public function getById(int $id): ?Product
    {
        $stmt = $this->db->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            return new Product(
                id: $row['id'],
                name: $row['name'],
                in_stock: $row['in_stock'],
                description: $row['description'],
                category: $row['category'],
                brand: $row['brand'],
                prices: $this->priceRepo->getByProductId($row['id']),
                images: $this->imageRepo->getByProductId($row['id']),
                attributes: $this->attributeRepo->getByProductId($row['id']),
                items: $this->itemRepo->getByProductId($row['id'])
            );
        }

        return null;
    }

    public function getAll(): array
    {
        $stmt = $this->db->query("SELECT * FROM products");
        $products = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $products[] = new Product(
                id: $row['id'],
                name: $row['name'],
                in_stock: $row['in_stock'],
                description: $row['description'],
                category: $row['category'],
                brand: $row['brand'],
                prices: $this->priceRepo->getByProductId($row['id']),
                images: $this->imageRepo->getByProductId($row['id']),
                attributes: $this->attributeRepo->getByProductId($row['id']),
                items: $this->itemRepo->getByProductId($row['id'])
            );
        }

        return $products;
    }
}
