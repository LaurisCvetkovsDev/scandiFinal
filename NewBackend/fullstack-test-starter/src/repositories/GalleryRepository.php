<?php

namespace App\Repositories;

use App\Config\Database;
use App\Entities\Image;
use PDO;

class GalleryRepository
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function getByProductId(int $productId): array
    {
        $stmt = $this->db->prepare("SELECT * FROM product_gallery WHERE product_id = ?");
        $stmt->execute([$productId]);

        $images = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $images[] = new Image(
                $row['id'],
                $row['image_url'],
                $row['product_id']
            );
        }

        return $images;
    }
}
