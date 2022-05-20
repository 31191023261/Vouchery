<?php
   Class Product_place{
        private $place_id;
        private $place_name;
        private $place_ename;
       
       

        public function getplace_id(){return $this->place_id; }
        public function getplace_name(){return $this->place_name	; }
        public function getplace_ename(){return $this->place_ename;}
     

        public function __construct($place_id, $place_name,$place_ename){
            $this->place_id = $place_id;
            $this->place_name=$place_name;
            $this->place_ename=$place_ename;
           
        } 
    }
?>