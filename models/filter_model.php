<?php
    require_once("product.php");
    require_once("product_place.php");
    require_once("product_type.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/dashboard/vouchery/modules/db_module.php");
    class FilterModel{
        public function getplace($category){
            $link=null;
            taoKetNoi($link);
            $data = 1;
            $result = chayTruyVanTraveDL($link, "select * from tbl_product_place where place_name ='".$category."'");
            while($rows = mysqli_fetch_assoc($result)){
                $product = new  Product_place($rows["place_id"], $rows["place_name"], 
                $rows["place_ename"]); 
                if($product != null){
                    $data= $product->getplace_id();
                    break;
                }
            }
            giaiPhongBonho($link, $result); 
            return $data;
        }
        public function gettype($category){
            $link=null;
            taoKetNoi($link);
            $data = 0;
            $result = chayTruyVanTraveDL($link, "select * from tbl_product_type");
            while($rows = mysqli_fetch_assoc($result)){
                $product = new  Product_type($rows["type_id"], $rows["type_name"], 
                $rows["type_ename"]); 
                $data= $product->gettype_id();
            }
            giaiPhongBonho($link, $result); 
            return $data;
        }
        public function getProductList($id){
            $link=null;
            taoKetNoi($link);
            $data = array();
            $result = chayTruyVanTraveDL($link, "select * from tbl_product where place_id ='".$id."'
                                                or type_id='".$id."'");
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