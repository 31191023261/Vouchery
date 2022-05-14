<?php
require_once("order_item.php");
require_once("order_details_item.php");
require_once("product.php");
require_once($_SERVER['DOCUMENT_ROOT']."/modules/db_module.php");

class OrderModel
{
    public function getOrderItems($user_id)
    {
        $link=null;
        taoKetNoi($link);
        $data = array();
        $result = chayTruyVanTraveDL($link, "SELECT * from tbl_order where user_id=$user_id");
        while($rows = mysqli_fetch_assoc($result))
        {
            $order_item = new OrderItem($rows["order_id"], $rows["user_id"], $rows["order_date"], $rows["order_status"]);
            array_push($data, $order_item);
        }
        giaiPhongBonho($link, $result); 
        return $data;
    }

    public function getSpecificOrderItems($order_id)
    {
        $link=null;
        taoKetNoi($link);
        $data = array();
        $result = chayTruyVanTraveDL($link, "SELECT * from tbl_order where order_id=$order_id");
        while($rows = mysqli_fetch_assoc($result))
        {
            $order_item = new OrderItem($rows["order_id"], $rows["user_id"], $rows["order_date"], $rows["order_status"]);
            array_push($data, $order_item);
        }
        giaiPhongBonho($link, $result); 
        return $order_item;
    }

    public function getOrderDetailsItem($order_id)
    {
        $link=null;
        taoKetNoi($link);
        $data = array();
        $result = chayTruyVanTraveDL($link, "SELECT * from tbl_order_details where order_id=$order_id");
        while($rows = mysqli_fetch_assoc($result))
        {
            $order_details = new OrderDetailsItem($rows["order_id"], $rows["product_id"], $rows["product_quantity"]);
            array_push($data, $order_details);
        }
        giaiPhongBonho($link, $result); 
        return $data;
    }

    public function getProducts($product_id)
    {
        $link=null;
        taoKetNoi($link);
        $data = array();
        $result = chayTruyVanTraveDL($link, "SELECT * from tbl_product where product_id=$product_id");
        while($rows = mysqli_fetch_assoc($result))
        {
            $product = new Product($rows["product_id"], $rows["product_name"], 
            $rows["product_price"], $rows["category_id"], $rows["product_highlighted"], 
            $rows["product_thumbnail"],$rows["product_producer"],$rows["product_origin"],
            $rows["product_maintenance"], $rows["product_preview"]); 
            array_push($data, $product);
        }
        giaiPhongBonho($link, $result); 
        return $product;
    }
}
?>