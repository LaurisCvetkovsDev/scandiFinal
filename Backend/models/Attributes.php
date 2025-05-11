<?php


class Attributes
{
    public string $product_id;
    public int $id;
    public string $attr_id;
    public string $name;
    public string $type;


    public function __construct(
        $product_id = '',
        $id = 0,
        $attr_id = 0,
        $name = '',
        $type = ''

    ) {
        $this->product_id = $product_id;
        $this->id = $id;
        $this->attr_id = $attr_id;
        $this->name = $name;
        $this->type = $type;
    }
}
?>