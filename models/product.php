<?php
class Product{
    private $product_id;
    private $product_name;
    private $product_price;
    private $place_id;
    private $type_id;
    private $product_thumbnail;
    private $user_id;
    private $product_details;
    private $product_instruction;

    public function getproduct_id(){return $this->product_id; }
    public function getproduct_name(){return $this->product_name; }
    public function getproduct_price(){return $this->product_price; }
    public function getplace_id(){return $this->place_id; }
    public function getype_id(){return $this->type_id; }
    public function getuser_id(){return $this->user_id; }
    public function getproduct_details(){return $this->product_details; }
    public function getproduct_thumbnail(){return $this->product_thumbnail; }
    public function getproduct_instruction(){return $this->product_instruction; }

    public function __construct($product_id,$product_name, $product_price, $place_id,$type_id,
    $product_thumbnail,$user_id,$product_details,$product_instruction){
        $this->product_id = $product_id;
        $this->product_name = $product_name;
        $this->product_price = $product_price;
        $this->place_id = $place_id;
        $this->type_id = $type_id;
        $this->product_thumbnail = $product_thumbnail;
        $this->user_id = $user_id;
        $this->product_details = $product_details;
        $this->product_instruction =$product_instruction;
        
    }
}   
?>
