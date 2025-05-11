<?php
require_once __DIR__ . '/../models/Attributes.php';

class AttributeRepository
{
    private PDO $conn;

    public function __construct(PDO $conn)
    {
        $this->conn = $conn;
    }

    public function findByProductId(string $productId): array
    {
        $stmt = $this->conn->prepare("SELECT * FROM product_attributes WHERE product_id = ?");
        $stmt->execute([$productId]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $attributes = [];
        foreach ($rows as $row) {
            $attributes[] = new Attributes(
                $row['product_id'],
                $row['id'],
                $row['attr_id'],
                $row['name'],
                $row['type']
            );
        }
        return $attributes;
    }
}



?>