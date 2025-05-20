<?php

namespace App\Repositories;

use App\Config\Database;
use App\Entities\Attributes;
use PDO;

class AttributeRepository
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function getByProductId(int $productId): array
    {
        $stmt = $this->db->prepare("SELECT * FROM product_attributes WHERE product_id = ?");
        $stmt->execute([$productId]);

        $prices = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $attributes[] = new Attributes(
                product_id: $row['product_id'],
                id: $row['id'],
                attr_id: $row['attr_id'],
                name: $row['name'],
                type: $row['type']
            );
        }

        return $attributes;
    }
}
