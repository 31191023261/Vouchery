<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/models/search_model.php");
    class SearchController{
        public $model;
        public function __construct()
        {
            $this->model = new SearchModel();
        }
        public function search_invoke($keyword){
            $category= $this->model->getProduct_category();
            $productlist=$this->model->getProductByKeyword($keyword);
            $name = "";
            include "searchview.php";
        }

        public function search_invoke_for_buttons(){
            $category= $this->model->getProduct_category();
            $productlist=$this->model->getProductList();
            $name = "button";
            include "searchview.php";
        }
    
    }
?>
