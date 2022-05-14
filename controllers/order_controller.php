<?php
require_once($_SERVER['DOCUMENT_ROOT']."/models/order_model.php");

class OrderController
{
    public $model;
    public function __construct()
    {
        $this->model = new OrderModel();
    }
    public function getOrderItemsDetails($user_id)
    {
        $order_items = $this->model->getOrderItems($user_id);
        $all_order_details_items = array();
        foreach($order_items as $item)
        {
            $order_details_items = $this->model->getOrderDetailsItem($item->getorder_id());
            foreach($order_details_items as $detail_item)
            {
                array_push($all_order_details_items, $detail_item);
            }
        }
        include "order_view.php";
    }
}
?>