<?php
require_once __DIR__ . '/../models/Image.php';

class GalleryRepository
{
    private PDO $conn;

    public function __construct(PDO $conn)
    {
        $this->conn = $conn;
    }

    public function findByProductId(string $productId): array
    {
        $stmt = $this->conn->prepare("SELECT * FROM product_gallery WHERE product_id = ?");
        $stmt->execute([$productId]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $images = [];
        foreach ($rows as $row) {
            $images[] = new Image(
                $row['id'],
                $row['image_url'],
                $row['product_id']
            );
        }
        return $images;
    }
    public function getByProductId($productId)
    {
        $stmt = $this->conn->prepare('SELECT * FROM product_gallery WHERE product_id = :productId');
        $stmt->execute(['productId' => $productId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>