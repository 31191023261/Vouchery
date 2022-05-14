<?php
    require_once("specs.php");
    require_once("review.php");
    require_once("product.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/modules/db_module.php");

    class DetailModel{
        // get product
        public function getProduct($id){
            $link=null;
            taoKetNoi($link);
            $data = array();
            $result = chayTruyVanTraveDL($link, "SELECT * from tbl_product where product_id=$id");
            while($rows = mysqli_fetch_assoc($result)){
                $product = new Product($rows["product_id"], $rows["product_name"], 
                $rows["product_price"], $rows["category_id"], $rows["product_highlighted"], 
                $rows["product_thumbnail"],$rows["product_producer"],$rows["product_origin"],
                $rows["product_maintenance"], $rows["product_preview"]); 
                array_push($data, $product);
            }
            giaiPhongBonho($link, $result); 
            return $product;
        }
        // get Spec list
    
        public function getSpec($id){
            $link=null;
            taoKetNoi($link);
            $data = array();
                $result = chayTruyVanTraveDL($link, "SELECT * from tbl_specs where product_id=$id");
                while($rows = mysqli_fetch_assoc($result)){
                    $spec = new Spec($rows["product_id"], $rows["spec_name"], 
                    $rows["spec_detail"]); 
                    array_push($data, $spec); 
                } 
            giaiPhongBonho($link, $result); 
            return $data;
        }
        public function getReview($id){
            $link=null;
            taoKetNoi($link);
                $result = chayTruyVanTraveDL($link, "SELECT * from tbl_review where product_id=$id");
                while($rows = mysqli_fetch_assoc($result)){
                    $review = new Review($rows["product_id"], $rows["review_content"]);
                } 
            giaiPhongBonho($link, $result); 
            return $review;
        }


    } 
?>