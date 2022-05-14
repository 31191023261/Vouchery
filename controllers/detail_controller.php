<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/models/detail_model.php");
    class DetailController{
        public $model;
        public function __construct()
        {
            $this->model = new DetailModel();
        }
        public function product_detail_invoke($id){
            $spec =$this->model->getSpec($id);
            $product=$this->model->getProduct($id);
            $review=$this->model->getReview($id);
            include "detail_view.php";   
        }

        
    }
?>
