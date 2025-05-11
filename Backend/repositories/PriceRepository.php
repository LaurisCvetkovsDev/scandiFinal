<?php
require_once __DIR__ . '/../models/Price.php';

class PriceRepository
{
    private PDO $conn;

    public function __construct(PDO $conn)
    {
        $this->conn = $conn;
    }

    public function findByProductId(string $productId): array
    {
        $stmt = $this->conn->prepare("SELECT * FROM product_prices WHERE product_id = ?");
        $stmt->execute([$productId]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $prices = [];
        foreach ($rows as $row) {
            $prices[] = new Price(
                $row['id'],
                $row['product_id'],
                $row['currency_label'],
                $row['currency_symbol'],
                $row['amount']
            );
        }
        return $prices;
    }
    public function getByProductId($productId)
    {
        $stmt = $this->conn->prepare('SELECT * FROM product_prices WHERE product_id = ?');
        $stmt->execute([$productId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>