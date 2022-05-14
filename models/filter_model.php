<?php
    require_once("special_offer.php");
    require_once("specs.php");
    require_once("product.php");
    require_once("product_category.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/modules/db_module.php");

    class FilterModel{
        public function getRam($ram){
            $link=null;
            taoKetNoi($link);
            $data = array();
            if($ram==null){
                $result = chayTruyVanTraveDL($link, "SELECT * from tbl_specs where spec_name='RAM'");
                while($rows = mysqli_fetch_assoc($result)){
                    $spec = new Spec($rows["product_id"], $rows["spec_name"], 
                    $rows["spec_detail"]); 
                    array_push($data, $spec); 
                }
            }
            else{
               
                foreach($ram as $r){
                    $result = chayTruyVanTraveDL($link, "SELECT * from tbl_specs where spec_name='RAM' and spec_detail='".$r."'");
                    while($rows = mysqli_fetch_assoc($result)){
                        $spec = new Spec($rows["product_id"], $rows["spec_name"], 
                        $rows["spec_detail"]); 
                        array_push($data, $spec);
                    }
                }
            }
            giaiPhongBonho($link, $result); 
            return $data;
        }
        public function getBNT($bnt){
            $link=null;
            taoKetNoi($link);
            $data = array();
            if($bnt==null){
                $result = chayTruyVanTraveDL($link, "SELECT * from tbl_specs where spec_name='Bộ nhớ trong'");
                while($rows = mysqli_fetch_assoc($result)){
                    $spec = new Spec($rows["product_id"], $rows["spec_name"], 
                    $rows["spec_detail"]); 
                    array_push($data, $spec); 
                } 
            }
            else{
              
                foreach($bnt as $b){
                    $result = chayTruyVanTraveDL($link, "SELECT * from tbl_specs where spec_name='Bộ nhớ trong' and spec_detail='".$b."'");
                    while($rows = mysqli_fetch_assoc($result)){
                        $spec = new Spec($rows["product_id"], $rows["spec_name"], 
                        $rows["spec_detail"]); 
                        array_push($data, $spec);
                    }
                }
            }
            giaiPhongBonho($link, $result); 
            return $data;
        }
        public function getCPU($cpu){
            $link=null;
            taoKetNoi($link);
            $data = array();
            if($cpu==null){
                $result = chayTruyVanTraveDL($link, "SELECT * from tbl_specs where spec_name='CPU'");
                while($rows = mysqli_fetch_assoc($result)){
                    $spec = new Spec($rows["product_id"], $rows["spec_name"], 
                    $rows["spec_detail"]); 
                    array_push($data, $spec); 
                } 
            }
            else{
              
                foreach($cpu as $c){
                    $result = chayTruyVanTraveDL($link, "SELECT * from tbl_specs where spec_name='CPU' and spec_detail='i7, 10750H, 2.6GHz'");
                    while($rows = mysqli_fetch_assoc($result)){
                        $spec = new Spec($rows["product_id"], $rows["spec_name"], 
                        $rows["spec_detail"]); 
                        array_push($data, $spec);
                    }
                }
            }
            giaiPhongBonho($link, $result); 
            return $data;
        }
        public function getTabletList($brand){
            $link=null;
            taoKetNoi($link);
            $data = array();
            if($brand==null){
                $result = chayTruyVanTraveDL($link, "select * from tbl_product where category_id=2");
                while($rows = mysqli_fetch_assoc($result)){
                    $product = new Product($rows["product_id"], $rows["product_name"], 
                    $rows["product_price"], $rows["category_id"], $rows["product_highlighted"], 
                    $rows["product_thumbnail"],$rows["product_producer"],$rows["product_origin"],
                    $rows["product_maintenance"], $rows["product_preview"]); 
                    array_push($data, $product);
                }
            }
            else{
                foreach($brand as $b)
                {
                    $result = chayTruyVanTraveDL($link, "SELECT * from tbl_product where category_id=2 and product_producer='".$b."'");
                    while($rows = mysqli_fetch_assoc($result)){
                        $product = new Product($rows["product_id"], $rows["product_name"], 
                        $rows["product_price"], $rows["category_id"], $rows["product_highlighted"], 
                        $rows["product_thumbnail"],$rows["product_producer"],$rows["product_origin"],
                        $rows["product_maintenance"], $rows["product_preview"]); 
                        array_push($data, $product);
                    }
                }
            }
            giaiPhongBonho($link, $result); 
            return $data;

        }
        public function getPhoneList($brand){
            $link=null;
            taoKetNoi($link);
            $data = array();
            if($brand==null){
                $result = chayTruyVanTraveDL($link, "select * from tbl_product where category_id=1");
                while($rows = mysqli_fetch_assoc($result)){
                    $product = new Product($rows["product_id"], $rows["product_name"], 
                    $rows["product_price"], $rows["category_id"], $rows["product_highlighted"], 
                    $rows["product_thumbnail"],$rows["product_producer"],$rows["product_origin"],
                    $rows["product_maintenance"], $rows["product_preview"]); 
                    array_push($data, $product);
                }
            }
            else{
                foreach($brand as $b)
                {
                    $result = chayTruyVanTraveDL($link, "SELECT * from tbl_product where category_id=1 and product_producer='".$b."'");
                    while($rows = mysqli_fetch_assoc($result)){
                        $product = new Product($rows["product_id"], $rows["product_name"], 
                        $rows["product_price"], $rows["category_id"], $rows["product_highlighted"], 
                        $rows["product_thumbnail"],$rows["product_producer"],$rows["product_origin"],
                        $rows["product_maintenance"], $rows["product_preview"]); 
                        array_push($data, $product);
                    }
                }
            }
            giaiPhongBonho($link, $result); 
            return $data;

        }
        public function getLaptopList($brand){
            $link=null;
            taoKetNoi($link);
            $data = array();
            if($brand==null){
                $result = chayTruyVanTraveDL($link, "select * from tbl_product where category_id=3");
                while($rows = mysqli_fetch_assoc($result)){
                    $product = new Product($rows["product_id"], $rows["product_name"], 
                    $rows["product_price"], $rows["category_id"], $rows["product_highlighted"], 
                    $rows["product_thumbnail"],$rows["product_producer"],$rows["product_origin"],
                    $rows["product_maintenance"], $rows["product_preview"]); 
                    array_push($data, $product);
                }
            }
            else{
                foreach($brand as $b)
                {
                    $result = chayTruyVanTraveDL($link, "SELECT * from tbl_product where category_id=3 and product_producer='".$b."'");
                    while($rows = mysqli_fetch_assoc($result)){
                        $product = new Product($rows["product_id"], $rows["product_name"], 
                        $rows["product_price"], $rows["category_id"], $rows["product_highlighted"], 
                        $rows["product_thumbnail"],$rows["product_producer"],$rows["product_origin"],
                        $rows["product_maintenance"], $rows["product_preview"]); 
                        array_push($data, $product);
                    }
                }
            }
            giaiPhongBonho($link, $result); 
            return $data;

        }
        public function getAccessoriesList($brand){
            $link=null;
            taoKetNoi($link);
            $data = array();
            if($brand==null){
                $result = chayTruyVanTraveDL($link, "select * from tbl_product where category_id=4");
                while($rows = mysqli_fetch_assoc($result)){
                    $product = new Product($rows["product_id"], $rows["product_name"], 
                    $rows["product_price"], $rows["category_id"], $rows["product_highlighted"], 
                    $rows["product_thumbnail"],$rows["product_producer"],$rows["product_origin"],
                    $rows["product_maintenance"], $rows["product_preview"]); 
                    array_push($data, $product);
                }
            }
            else{
                foreach($brand as $b)
                {
                    $result = chayTruyVanTraveDL($link, "SELECT * from tbl_product where category_id=4 and product_producer='".$b."'");
                    while($rows = mysqli_fetch_assoc($result)){
                        $product = new Product($rows["product_id"], $rows["product_name"], 
                        $rows["product_price"], $rows["category_id"], $rows["product_highlighted"], 
                        $rows["product_thumbnail"],$rows["product_producer"],$rows["product_origin"],
                        $rows["product_maintenance"], $rows["product_preview"]); 
                        array_push($data, $product);
                    }
                }
            }
            giaiPhongBonho($link, $result); 
            return $data;

        }


    } 
?>