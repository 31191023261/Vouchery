<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/models/filter_model.php");
    class FilterController{
        public $model;
        public function __construct()
        {
            $this->model = new FilterModel();
        }
        //filter tablet
        public function tablet_category_invoke($name){
                if(isset($_GET['minmax']))
                    $minmax = $_GET['minmax'];
                else
                    $minmax = null;
                if(isset($_GET['price']))
                    $price = $_GET['price'];
                else
                    $price = null;
                if(isset($_GET['ram']))
                {
                    $ram =  $_GET['ram'];
                }
                else
                    $ram = null;
                if(isset($_GET['bnt']))
                    $bnt =  $_GET['bnt'];
                else
                    $bnt = null;
                    if(isset($_GET['brand']))
                    $brand =  $_GET['brand'];
                else
                    $brand  = null;
            $ramlist = $this->model->getRam($ram);
            $bntlist = $this->model->getBNT($bnt);
            $tabletList= $this->model->getTabletList($brand);
            include "tablet_category_view.php";
        }
        //------------------------------------------------------------------------------//
        public function phone_category_invoke($name){
            if(isset($_GET['minmax']))
                $minmax = $_GET['minmax'];
            else
                $minmax = null;
            if(isset($_GET['price']))
                $price = $_GET['price'];
            else
                $price = null;
            if(isset($_GET['ram']))
            {
                $ram =  $_GET['ram'];
            }
            else
                $ram = null;
            if(isset($_GET['bnt']))
                $bnt =  $_GET['bnt'];
            else
                $bnt= null;
            if(isset($_GET['brand']))
                $brand =  $_GET['brand'];
            else
                $brand  = null;
            $ramlist = $this->model->getRam($ram);
            $bntlist = $this->model->getBNT($bnt);
            $phoneList= $this->model->getPhoneList($brand);
            include "phone_category_view.php";
        }
        //------------------------------------------------------------------------------//
        public function accessories_category_invoke($name){
            if(isset($_GET['minmax']))
                $minmax = $_GET['minmax'];
            else
                $minmax = null;
            if(isset($_GET['brand']))
                $brand =  $_GET['brand'];
            else
                $brand  = null;
            $accessoriesList= $this->model->getAccessoriesList($brand);
            include "accessories_category_view.php";
        }
        //-------------------------------------------------------------------------------//
        public function laptop_category_invoke($name){
            if(isset($_GET['minmax']))
                $minmax = $_GET['minmax'];
            else
                $minmax = null;
            if(isset($_GET['price']))
                $price = $_GET['price'];
            else
                $price = null;
            if(isset($_GET['ram']))
            {
                $ram =  $_GET['ram'];
            }
            else
                $ram = null;
            if(isset($_GET['CPU']))
            {
                $cpu =  $_GET['CPU'];
            }
            else
                $cpu = null;
            if(isset($_GET['brand']))
                $brand =  $_GET['brand'];
            else
                $brand  = null;
            $laptopList= $this->model->getLaptopList($brand);
            $ramlist = $this->model->getRam($ram);
            $cpulist = $this->model->getCPU($cpu);
            include "laptop_category_view.php";
        }
    }
?>
