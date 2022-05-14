<?php
    require_once("special_offer.php");
    require_once("specs.php");
    require_once("product.php");
    require_once("product_category.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/modules/db_module.php");

    class IndexModel{
        public function getSpecial_offerList(){
            $link=null;
            taoKetNoi($link);
            $data = array();
            $result = chayTruyVanTraveDL($link, "select * from tbl_special_offer");
              while($rows = mysqli_fetch_assoc($result)){
                $speial_offer = new Special_offer($rows["special_offer_id"], $rows["special_offer_name"], 
                $rows["special_offer_img"], $rows["special_offer_details"]); 
                array_push($data, $speial_offer);
            }
            giaiPhongBonho($link, $result); 
            return $data;
        }
        public function getSpecial_offer($id){
            $link=null;
            taoKetNoi($link);
            $data = array();
            $result = chayTruyVanTraveDL($link, "SELECT * from tbl_special_offer where special_offer_id=$id");
              while($rows = mysqli_fetch_assoc($result)){
                $speial_offer = new Special_offer($rows["special_offer_id"], $rows["special_offer_name"], 
                $rows["special_offer_img"], $rows["special_offer_details"]); 
                array_push($data, $speial_offer);
            }
            giaiPhongBonho($link, $result); 
            return $data;
        }
        public function getProduct_categoryId()
        {
            $link=null;
            taoKetNoi($link);
            $data = array();
            $result = chayTruyVanTraveDL($link, "select * from tbl_product_category");
                while($rows = mysqli_fetch_assoc($result)){
                  $product_category= new Product_category($rows["category_id"],$rows["category_name"],$rows["category_ename"]);
                  array_push($data, $product_category);
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
                $rows["product_thumbnail"],$rows["product_producer"],$rows["product_origin"],
                $rows["product_maintenance"], $rows["product_preview"]); 
                array_push($data, $product);
            }
            giaiPhongBonho($link, $result); 
            return $data;

        }
    } 
?>