<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/dashboard/vouchery/models/filter_model.php");
    class FilterController{
        public $model;
        public function __construct()
        {
            $this->model = new FilterModel();
        }
        public function category_invoke(){
            if(isset($_GET['placeid']))
            {
                    $category = "place";
                    $product = $this-> model->getplace($category);
            }
            else{
                if(isset($_GET['typeid']))
                {
                        $category = "type";
                        $product = $this-> model->gettype($category);
                }
                else{
                    $category =null; 
                }
            }
            $productlist= $this-> model->getProductList($product);
            include "category_view.php";
        }
    }
?>
