<?php
    $p_id           =$product->getproduct_id();
    $p_name         =$product->getproduct_name();
    $p_price        =$product->getproduct_price(); 
    $p_producer     =$product->getproduct_producer();
    $p_origin       =$product->getproduct_origin(); 
    $p_maintenance  =$product->getproduct_maintenance();
    $p_thumbnail    =$product->getproduct_thumbnail();
    $p_preview      =$product->getproduct_preview();
    $arr_preview    =explode(";",$p_preview);
  
    echo'
    <div class="product-left-div col-12 col-lg-7">

        <div id="products-preview-carousel" class="carousel slide" data-ride="carousel" style="margin-bottom: 3rem;">
            <div class="carousel-inner">
        ';
    
            for($i = 0; $i<count($arr_preview)-1;$i++){
                if($i==0)
                {
                    echo'
                        <div class="carousel-item active">
                            <img class="product-preview-img" src="'.$arr_preview[$i].'">
                        </div>
                    ';
                }
                else{
                    echo'
                    <div class="carousel-item">
                        <img class="product-preview-img" src="'.$arr_preview[$i].'">
                    </div>
                '; 
                }
            }
        echo'
        </div>
            <a class="carousel-control-prev" href="#products-preview-carousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#products-preview-carousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
        
    <div class="product-right-div-inside" style="display: none;">
        <h2 style="margin-bottom: 1rem;">'.$p_name.'</h2>
        <h5>Nhà sản xuất:</h4><span>'.$p_producer.'</span>
        <h5>Xuất sứ:</h4><span>'.$p_origin.'</span>
        <h5>Bảo hành:</h4><span>'.$p_maintenance.'</span>
        <h4 style="color: red; margin-top: 1rem;">'.number_format((int)$p_price, 0, ",", ".").' đ</h4>
        <form action="add_to_cart.php" method="GET">
            <input type="hidden" name="productid" value="'.$p_id.'" />
            <button type="submit" class="btn add-to-cart-button">
                <i class="bi-cart"></i>
                Thêm vào giỏ hàng
            </button>
        </form>
        <div style="margin-top: 3rem;">
            <h4>Cấu hình điện thoại</h4>
            <table class="table" id="product-specs-table" style="margin-top: 3rem;">
            ';
            foreach($spec as $s)
        echo'
                <tr>
                    <td>'.$s->getspec_name().':</td>
                    <td>'.$s->getspec_detail().'</td>
                </tr>
    ';

    echo'
            </table>
        </div>
    </div>

    <div class="product-review-article w-100">
        <h3>Bài viết đánh giá</h3>
        '.$review->getreview_content().'
    </div>

</div>

<div class="product-right-div col-lg-5">
    <h2 style="margin-bottom: 1rem;">'.$p_name.'</h2>
    <h5>Nhà sản xuất:</h4><span>'.$p_producer.'</span>
    <h5>Xuất sứ:</h4><span>'.$p_origin.'</span>
    <h5>Bảo hành:</h4><span>'.$p_maintenance.'</span>
    <h4 style="color: red; margin-top: 1rem;">'.number_format((int)$p_price, 0, ",", ".").' đ</h4>
    <form action="add_to_cart.php" method="GET">
        <input type="hidden" name="productid" value="'.$p_id.'" />
        <button type="submit" class="btn add-to-cart-button">
            <i class="bi-cart"></i>
            Thêm vào giỏ hàng
        </button>
    </form>
    <div style="margin-top: 3rem;">
        <table class="table" id="product-specs-table" style="margin-top: 3rem;">
        ';
        foreach($spec as $s)
        if($s->getspec_name()=="RAM" || $s->getspec_name()=="Bộ nhớ trong")
        {
            echo'
                <tr>
                    <td>'.$s->getspec_name().':</td>
                    <td>'.$s->getspec_detail().' GB</td>
                </tr>
            ';
        }
        else{
            echo'
            <tr>
                <td>'.$s->getspec_name().':</td>
                <td>'.$s->getspec_detail().'</td>
            </tr>
        ';
        }
echo'

        </table>
    </div>
</div>
    ';
?>