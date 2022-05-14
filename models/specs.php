<?php
    class Spec{
        private $product_id;
        private $spec_name	;
        private $spec_detail;
       
       

        public function getproduct_id(){return $this->product_id; }
        public function getspec_name(){return $this->spec_name	; }
        public function getspec_detail(){return $this->spec_detail;}
     

        public function __construct($product_id, $spec_name,$spec_detail){
            $this->product_id = $product_id;
            $this->spec_name=$spec_name;
            $this->spec_detail=$spec_detail;
           
        }   
    }
?>