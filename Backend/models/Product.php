<?php
class Product
{
    public $id;
    public $name;
    public $in_stock;
    public $description;
    public $category;
    public $brand;

    public function __construct($id = '', $name = '', $in_stock = 1, $description = '', $category = '', $brand = '')
    {
        $this->id = $id;
        $this->name = $name;
        $this->in_stock = $in_stock;
        $this->description = $description;
        $this->category = $category;
        $this->brand = $brand;
    }
}

?>