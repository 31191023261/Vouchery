<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/models/index_model.php");
    class IndexController{
        public $model;
        public function __construct()
        {
            $this->model = new IndexModel();
        }

        public function special_offer_invoke($name){ 
            if(!isset($_GET['special_offer_id'])){
                $special_offers = $this->model->getSpecial_offerList();
                include "special_offerlist.php";    
            }
            else{
                $special_offer = $this->model->getSpecial_offer($_GET['special_offer_id']);
                include "special_offer_detail.php";
            }
        }
        public function product_invoke($name){
            $category_id= $this->model->getProduct_categoryId();
            $productlist=$this->model->getProductList();
            include "product_hightlighted.php";   
        }

        
    }
?>
