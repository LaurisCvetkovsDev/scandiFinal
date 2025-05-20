<?php
class AttributeItem
{
    public int $id;
    public string $product_id;
    public string $attr_id;
    public string $item_id;
    public string $display_value;
    public string $value;
    public function __construct(
        $id = 0,
        $product_id = '',
        $attr_id = '',
        $item_id = '',
        $display_value = '',
        $value = ''

    ) {
        $this->id = $id;
        $this->product_id = $product_id;
        $this->attr_id = $attr_id;
        $this->item_id = $item_id;
        $this->display_value = $display_value;
        $this->value = $value;
    }
}
?>