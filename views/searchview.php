<!DOCTYPE html> 
<html>
    <body>
        <?php
            foreach($productlist as $product){
                    echo 
                               '<div class="card pt-card col-6 col-lg-3 float-left border-0">
                                    <img src="/dashboard/vouchery/'.$product->getproduct_thumbnail().'" class="card-img-top img-product-thumbnail" alt="">
                                    <div class="card-body">
                                        <h5 class="card-title">'.$product->getproduct_name().'</h5>
                                        <p class="card-text">'.number_format($product->getproduct_price(), 0, ",", ".").' đ</p>
                                        <a href="details.php?productid='.$product->getproduct_id().'" class="stretched-link"></a>
                                    </div>
                                </div>
                            ';
                 }
        ?>
    </body> 
</html>
