<?php
class CartItem
{
    private $user_id;
    private $product_id;
    private $product_quantity;

    public function getuser_id(){return $this->user_id;}
    public function getproduct_id(){return $this->product_id;}
    public function getproduct_quantity(){return $this->product_quantity;}

    public function __construct($user_id, $product_id, $product_quantity)
    {
        $this->user_id = $user_id;
        $this->product_id = $product_id;
        $this->product_quantity = $product_quantity;
    }
}
?>