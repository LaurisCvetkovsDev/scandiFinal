<?php

namespace App\Repositories;

use App\Config\Database;
use App\Entities\Price;
use PDO;

class PriceRepository
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function getByProductId(int $productId): array
    {
        $stmt = $this->db->prepare("SELECT * FROM prices WHERE product_id = ?");
        $stmt->execute([$productId]);

        $prices = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $prices[] = new Price(
                id: $row['id'],
                product_id: $row['product_id'],
                currency_label: $row['currency_label'],
                currency_symbol: $row['currency_symbol'],
                amount: $row['amount'],
            );
        }

        return $prices;
    }
}
