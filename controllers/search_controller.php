<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/dashboard/vouchery/models/search_model.php");
    class SearchController{
        public $model;
        public function __construct()
        {
            $this->model = new SearchModel();
        }
        public function search_invoke($keyword){
            $productlist=$this->model->getProductByKeyword($keyword);
            include "searchview.php";
        }
    }
?>
