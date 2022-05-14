<!DOCTYPE html> 
<html>
    <body>
        <?php
            foreach($category_id as $category){
                if($category->getproduct_category_name() == $name){
                    $id=$category->getproduct_category_id();
                }
            }

            $first_product = false;
            foreach($productlist as $product){
                if($product-> getcategory_id() == $id){
                    if($product->getproduct_highlighted() == true && !$first_product){
                        $first_product = true;
                        echo"
                            <div class='carousel-item active'>
                                <div class='card pt-card col-6 col-lg-3 float-left border-0'>
                                <img src='".$product->getproduct_thumbnail()."' class='card-img-top img-product-thumbnail'alt='San pham'>
                                <div class='card-body'>
                                    <h5 class='card-title'>".$product->getproduct_name()."</h5>
                                    <p class='card-text'>".number_format($product->getproduct_price(), 0, ",", ".")." đ</p>
                                    <a href='details.php?productid=".$product->getproduct_id()."' class='stretched-link'></a>
                                </div>
                            </div>
                        ";
                    }
                    else{
                        if($product->getproduct_highlighted() == true && ($product->getproduct_id() - 1 ) % 4 == 0)
                        {
                            echo"
                                </div>
                                    <div class='carousel-item'>
                                    <div class='card pt-card col-6 col-lg-3 float-left border-0'>
                                        <img src='".$product->getproduct_thumbnail()."' class='card-img-top img-product-thumbnail'alt='San pham'>
                                        <div class='card-body'>
                                            <h5 class='card-title'>".$product->getproduct_name()."</h5>
                                            <p class='card-text'>".number_format($product->getproduct_price(), 0, ",", ".")." đ</p>
                                            <a href='details.php?productid=".$product->getproduct_id()."' class='stretched-link'></a>
                                    </div>
                                </div>
                            ";
                        }
                        else{
                            if($product->getproduct_highlighted() == true){
                                echo"
                                    <div class='card pt-card col-6 col-lg-3 float-left border-0'>
                                        <img src='".$product->getproduct_thumbnail()."' class='card-img-top img-product-thumbnail'alt='San pham'>
                                        <div class='card-body'>
                                            <h5 class='card-title'>".$product->getproduct_name()."</h5>
                                            <p class='card-text'>".number_format($product->getproduct_price(), 0, ",", ".")." đ</p>
                                            <a href='details.php?productid=".$product->getproduct_id()."' class='stretched-link'></a>
                                        </div>
                                    </div>
                                ";  
                            }
                        }
                    }
                }
            }
        ?>
    </body> 
</html>
