<?php
require_once __DIR__ . '/../models/AttributeItem.php';

class AttributeItemRepository
{
    private PDO $conn;

    public function __construct(PDO $conn)
    {
        $this->conn = $conn;
    }

    public function findByAttrIdAndProductId(string $attrId, string $productId): array
    {
        $stmt = $this->conn->prepare("SELECT * FROM attribute_items WHERE attr_id = ? AND product_id = ?");
        $stmt->execute([$attrId, $productId]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $items = [];
        foreach ($rows as $row) {
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


?>