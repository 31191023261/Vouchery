<?php
    class Special_offer{
        private $special_offer_id;
        private $special_offer_name	;
        private $special_offer_img;
        private $special_offer_details;

        public function getspecial_offer_id(){return $this->special_offer_id; }
        public function getspecial_offer_name	(){return $this->special_offer_name	; }
        public function getspecial_offer_img(){return $this->special_offer_img; }
        public function getspecial_offer_details(){return $this->special_offer_details; }

        public function __construct($special_offer_id, $special_offer_name	, $special_offer_img, $special_offer_details){
            $this->special_offer_id = $special_offer_id;
            $this->special_offer_name=$special_offer_name;
            $this->special_offer_img = $special_offer_img;
            $this->special_offer_details = $special_offer_details;
        }   
    }
?>