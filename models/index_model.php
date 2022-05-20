<?php
    require_once("product.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/dashboard/vouchery/modules/db_module.php");

    class IndexModel{
        public function getProductList(){
            $link=null;
            taoKetNoi($link);
            $data = array();
            $result = chayTruyVanTraveDL($link, "select * from tbl_product");
            while($rows = mysqli_fetch_assoc($result)){
                $product = new Product($rows["product_id"], $rows["product_name"], 
                $rows["product_price"], $rows["place_id"], $rows["type_id"], 
                $rows["product_thumbnail"],$rows["user_id"],$rows["product_details"],
                $rows["product_instruction"]); 
                array_push($data, $product);
            }
            giaiPhongBonho($link, $result); 
            return $data;

        }
    } 
?>