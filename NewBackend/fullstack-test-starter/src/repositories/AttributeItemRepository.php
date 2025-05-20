<?php

namespace App\Repositories;

use App\Config\Database;
use App\Entities\AttributeItem;
use PDO;

class AttributeItemRepository
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

        while ($row = $stmt->fetch(mode: PDO::FETCH_ASSOC)) {
            $items[] = new AttributeItem(
                $row['id'],
                $row['product_id'],
                $row['attr_id'],
                $row['item_id'],
                $row['display_value'],
                $row['value']
            );
        }

        return $items;
    }
}
