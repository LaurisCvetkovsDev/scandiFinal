<?php
class Image
{
    public int $id;
    public string $image_url;
    public string $product_id;

    public function __construct($id = 0, $image_url = '', $product_id = '')
    {
        $this->image_url = $image_url;
        $this->id = $id;
        $this->product_id = $product_id;

    }
}
?>