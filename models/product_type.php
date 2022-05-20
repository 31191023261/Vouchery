<?php
    class Product_type{
        private $type_id;
        private $type_name;
        private $type_ename;
       
       

        public function gettype_id(){return $this->type_id; }
        public function gettype_name(){return $this->type_name	; }
        public function gettype_ename(){return $this->type_ename;}
     

        public function __construct($type_id, $type_name,$type_ename){
            $this->type_id = $type_id;
            $this->type_name=$type_name;
            $this->type_ename=$type_ename;
           
        }   
    }
?>