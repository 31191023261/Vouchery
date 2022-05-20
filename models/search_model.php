<?php
    require_once("product.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/dashboard/vouchery/modules/db_module.php");
    class SearchModel{
        public function getProductByKeyword($keyword){
            $link=null;
            taoKetNoi($link);
            $data = array();
                $result = chayTruyVanTraVeDL($link, "select * from tbl_product where product_name like '%".$keyword."%'");
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