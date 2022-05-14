<?php
class OrderItem
{
    private $order_id;
    private $user_id;
    private $order_date;
    private $order_status;

    public function getorder_id(){return $this->order_id;}
    public function getuser_id(){return $this->user_id;}
    public function getorder_date(){return $this->order_date;}
    public function getorder_status(){return $this->order_status;}

    public function __construct($order_id, $user_id, $order_date, $order_status)
    {
        $this->order_id = $order_id;
        $this->user_id = $user_id;
        $this->order_date = $order_date;
        $this->order_status = $order_status;
    }
}
?>