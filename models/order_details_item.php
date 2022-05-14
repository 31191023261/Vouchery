<?php
class OrderDetailsItem
{
    private $order_id;
    private $product_id;
    private $product_quantity;

    public function getorder_id(){return $this->order_id;}
    public function getproduct_id(){return $this->product_id;}
    public function getproduct_quantity(){return $this->product_quantity;}

    public function __construct($order_id, $product_id, $product_quantity)
    {
        $this->order_id = $order_id;
        $this->product_id = $product_id;
        $this->product_quantity = $product_quantity;
    }
}
?>