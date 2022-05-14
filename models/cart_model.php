<?php
require_once("cart_item.php");
require_once("order_item.php");
require_once("product.php");
require_once($_SERVER['DOCUMENT_ROOT']."/modules/db_module.php");

class CartModel
{
    public function getCartItems($user_id)
    {
        $link=null;
        taoKetNoi($link);
        $data = array();
        $result = chayTruyVanTraveDL($link, "SELECT * from tbl_cart where user_id=$user_id");
        while($rows = mysqli_fetch_assoc($result))
        {
            $cart_item = new CartItem($rows["user_id"], $rows["product_id"], $rows["product_quantity"]);
            array_push($data, $cart_item);
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

    public function addCartItem($product_id)
    {
        $link=null;
        taoKetNoi($link);
        $result = chayTruyVanTraveDL($link, "SELECT * from tbl_cart where product_id = $product_id and user_id = ". $_SESSION["user_id"]);
        $data = array();
        while($rows = mysqli_fetch_assoc($result))
        {
            $cart_item = new CartItem($rows["user_id"], $rows["product_id"], $rows["product_quantity"]);
            array_push($data, $cart_item);
        }
        if(count($data) <= 0)
        {
            $query = "INSERT INTO `tbl_cart` (`user_id`, `product_id`, `product_quantity`) VALUES ( '".$_SESSION["user_id"]."', '".$product_id."', '1')";
        }
        else
        {
            $data1 = array();
            $q = chayTruyVanTraveDL($link, "SELECT * from tbl_cart where product_id = $product_id and user_id = ". $_SESSION["user_id"]);
            $cart_item;
            while($rows = mysqli_fetch_assoc($q))
            {
                $cart_item = new CartItem($rows["user_id"], $rows["product_id"], $rows["product_quantity"]);
                array_push($data1, $cart_item);
            }
            $query = "UPDATE tbl_cart SET product_quantity = ".$cart_item->getproduct_quantity()." where product_id = $product_id and user_id = ". $_SESSION["user_id"];
        }
        chayTruyVanKhongTraVeDL($link, $query);
        header("Location: cart_invoke.php");
        exit();
    }

    public function purchase($user_id)
    {
        $link=null;
        taoKetNoi($link);
        $data = array();
        $result = chayTruyVanTraVeDL($link, "SELECT * FROM tbl_cart where user_id = ".$user_id);
        while($rows = mysqli_fetch_assoc($result))
        {
            $cart_item = new CartItem($rows["user_id"], $rows["product_id"], $rows["product_quantity"]);
            array_push($data, $cart_item);
        }
        chayTruyVanKhongTraVeDL($link, "DELETE FROM tbl_cart where user_id = ".$user_id);
        $date = date("YY/mm/dd");
        chayTruyVanKhongTraVeDL($link, "INSERT INTO tbl_order  order_id, user_id , order_date, product_quantity) VALUES (  NULL ,".$user_id.", CAST('". $date ."' AS DATE), 1)");
        $last_order = chayTruyVanTraVeDL($link, "SELECT * FROM tbl_order ORDER BY order_id DESC LIMIT 1");
        $data1 = array();
        while($row = mysqli_fetch_assoc($last_order))
        {
            $order = new OrderItem($row["order_id"], $row["user_id"], $row["order_date"], $row["order_status"]);
            array_push($data1, $order);
        }
        foreach ($data as $item)
        {
            chayTruyVanKhongTraVeDL($link, "INSERT INTO `tbl_order_details` ( `order_id`, `product_id`, `product_quantity`) VALUES ( ".$order->getorder_id().",'".$item->getproduct_id()."', '".$item->getproduct_quantity()."')");
        }
        header("Location: order.php");
        exit();
    }
}
?>