<?php
if (count($all_order_details_items) <= 0)
{
    echo "<p>Không có lịch sử nào được ghi nhận.</p>";
}
else
{
    echo'                
    <table class="table cart-table">
        <thead>
            <th>STT</th>
            <th>Ngày</th>
            <th>Sản phẩm</th>
            <th>Số lượng</th>
            <th>Tình trạng</th>
        </thead>
    <tbody>';

    $count = 1;
    foreach ($all_order_details_items as $item)
    {
        $product = $this->model->getProducts($item->getproduct_id());
        $product_thumbnail = $product->getproduct_thumbnail();
        $product_name = $product->getproduct_name();
        echo'
        <tr>
            <td>'.$count.'</td>
            <td>'.$this->model->getSpecificOrderItems($item->getorder_id())->getorder_date().'</td>
            <td>
                <img src="'.$product_thumbnail.'" width="50">
                <a href="details.php?productid='.$item->getproduct_id().'">'.$product_name.'</a>
            </td>
            <td>'.$item->getproduct_quantity().'</td>
        ';
        $status = $this->model->getSpecificOrderItems($item->getorder_id())->getorder_status();
        if ($status == 0)
        {
            echo'
                <td>Chưa thanh toán</td>
            </tr>
            ';
        }
        else if ($status == 1)
        {
            echo'
                <td>Đã thanh toán</td>
            </tr>
        ';
        }
        else if ($status == 2)
        {
            echo'
                <td>Đã hoàn tất</td>
            </tr>
        ';
        }
        else if ($status == 3)
        {
            echo'
                <td>Đã huỷ</td>
            </tr>
        ';
        }
        $count++;
    }
    echo'
        </tbody>
    </table>
    ';
}
?>