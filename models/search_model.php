<?php
    require_once("product.php");
    require_once("product_category.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/modules/db_module.php");
    class SearchModel{
        public function getProduct_category()
        {
            $link=null;
            taoKetNoi($link);
            $data = array();
            $result = chayTruyVanTraveDL($link, "select * from tbl_product_category");
                while($rows = mysqli_fetch_assoc($result)){
                  $product_category = new Product_category($rows["category_id"],$rows["category_name"],$rows['category_ename']);
                  array_push($data, $product_category);
                }
            giaiPhongBonho($link, $result); 
            return $data;

        }
        public function getProductByKeyword($keyword){
            $link=null;
            taoKetNoi($link);
            $data = array();
                $result = chayTruyVanTraVeDL($link, "select * from tbl_product where product_name like '%".$keyword."%'");
                while($rows = mysqli_fetch_assoc($result)){
                $product = new Product($rows["product_id"], $rows["product_name"], 
                $rows["product_price"], $rows["category_id"], $rows["product_highlighted"], 
                $rows["product_thumbnail"], $rows["product_producer"], $rows["product_origin"], $rows["product_maintenance"], $rows["product_preview"]); 
                array_push($data, $product);
            }
            giaiPhongBonho($link, $result); 
            return $data;
        }
        public function getProductList(){
            $link=null;
            taoKetNoi($link);
            $data = array();
            $result = chayTruyVanTraveDL($link, "select * from tbl_product");
            while($rows = mysqli_fetch_assoc($result)){
                $product = new Product($rows["product_id"], $rows["product_name"], 
                $rows["product_price"], $rows["category_id"], $rows["product_highlighted"], 
                $rows["product_thumbnail"], $rows["product_producer"], $rows["product_origin"], $rows["product_maintenance"], $rows["product_preview"]); 
                array_push($data, $product);
            }
            giaiPhongBonho($link, $result); 
            return $data;

        }
        
    } 
?>