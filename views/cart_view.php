<?php
if (count($cart_items) <= 0)
{
    echo "<p>Chưa có mặt hàng nào trong giỏ!</p>";
}
else
{
    echo'                
    <table class="table cart-table">
        <thead>
            <th>STT</th>
            <th>Sản phẩm</th>
            <th>Số lượng</th>
            <th>Đơn giá (VND)</th>
        </thead>
    <tbody>';

    $count = 1;
    $quantity = 0; 
    $price = 0;
    foreach ($cart_items as $item)
    {
        $product = $this->model->getProducts($item->getproduct_id());
        $product_thumbnail = $product->getproduct_thumbnail();
        $product_name = $product->getproduct_name();
        $product_price = $product->getproduct_price();
        echo'
        <tr>
            <td>'.$count.'</td>
            <td>
                <img src="'.$product_thumbnail.'" width="50">
                <a href="details.php?productid='.$item->getproduct_id().'">'.$product_name.'</a>
            </td>
            <td>'.$item->getproduct_quantity().'</td>
            <td class="product-price">'.number_format($product_price, 0, ",", ".").'</td>
        </tr>
        ';
        $count++;
        $quantity += $item->getproduct_quantity();
        $price += $product_price;
    }
    echo'
            <tr>
                <td></td>
                <td></td>
                <td>
                    <span id="total-product-quantity" style="font-weight: 500;">'.$quantity.'</span>
                </td>
                <td id="total-product-price" style="font-weight: 500; color: red;">'.number_format($price, 0, ",", ".").'</td>
            </tr>
        </tbody>
    </table>
    ';
    echo'
    <form action="purchase.php" method="POST">
    <input type="hidden" name="userid" value="'.$_SESSION["user_id"].'" />
    <button type="submit" class="btn btn-primary">
        Đặt hàng
    </button>
    </form>
    ';
}
?>