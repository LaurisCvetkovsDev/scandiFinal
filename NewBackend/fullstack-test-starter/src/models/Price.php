<?php
class Price
{
    public $id;
    public $product_id;
    public $currency_label;
    public $currency_symbol;
    public $amount;

    public function __construct($id = 0, $product_id = '', $currency_label = '', $currency_symbol = '', $amount = 0)
    {
        $this->id = $id;
        $this->product_id = $product_id;
        $this->currency_label = $currency_label;
        $this->currency_symbol = $currency_symbol;
        $this->amount = $amount;
    }
}
?>