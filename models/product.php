<?php
class Product{
    private $product_id;
    private $product_name;
    private $product_price;
    private $category_id;
    private $product_highlighted;
    private $product_thumbnail;
    private $product_producer;
    private $product_origin;
    private $product_maintenance;
    private $product_preview;

    public function getproduct_id(){return $this->product_id; }
    public function getproduct_name(){return $this->product_name; }
    public function getproduct_price(){return $this->product_price; }
    public function getcategory_id(){return $this->category_id; }
    public function getproduct_highlighted(){return $this->product_highlighted; }
    public function getproduct_producer(){return $this->product_producer; }
    public function getproduct_origin(){return $this->product_origin; }
    public function getproduct_maintenance(){return $this->product_maintenance; }
    public function getproduct_thumbnail(){return $this->product_thumbnail; }
    public function getproduct_preview(){return $this->product_preview; }

    public function __construct($product_id,$product_name, $product_price, $category_id,$product_highlighted,
    $product_thumbnail,$product_producer,$product_origin,$product_maintenance,$product_preview){
        $this->product_id = $product_id;
        $this->product_name = $product_name;
        $this->product_price = $product_price;
        $this->category_id = $category_id;
        $this->product_highlighted = $product_highlighted;
        $this->product_thumbnail = $product_thumbnail;
        $this->product_producer = $product_producer;
        $this->product_origin = $product_origin;
        $this->product_maintenance =$product_maintenance;
        $this->product_preview =$product_preview;
        
    }
}   
?>
