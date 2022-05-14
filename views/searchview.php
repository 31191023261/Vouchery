<?php
        //lấy loại sản phẩm
        $arr = array(); 
        $j=0;
        foreach ($productlist as $product) 
        {
            if(!in_array($product->getcategory_id(), $arr))
            {
                $arr[$j] = $product->getcategory_id();   
                $j++;
            }
             
        }
        //lấy số lượng sản phẩm từng loại
        for($i=0; $i<count($arr); $i++){
            $arr_[$i]= array();
            $index = 0;
            foreach($productlist as $product){
                if($product->getcategory_id()==$arr[$i]){                   
                    $arr_[$i][$index]=$product->getproduct_id();
                    $index++;
                }
            }
        }
    // in button
    if($name == "button"){
        for($i = 0; $i<count($arr); $i++){
            $num = count($arr_[$i]);
/*             foreach($category as $ar){
                if($ar->getproduct_category_id() == $arr[$i])
            echo"
                <button onclick='selectResultCategory(".$ar->getproduct_category_id().")' id='".$ar->getproduct_category_class_name()."-category-select' 
                type='button' class='btn my-button cate-button'>".$ar->getproduct_category_name()." (".$num.")</button>
            ";
            } */
        }
    }
    // in sản phẩm
    else{
        for($i=0; $i<count($arr); $i++){ //chạy vòng lặp từng loại sản phẩm 
            $cate_name_displayed = false;
            for($j=0; $j<count($arr_[$i]); $j++){// chạy vòng lặp từng sản phẩm trong 1 loại 
                foreach($productlist as $product){
                    if($j==0 && $product->getproduct_id()==$arr_[$i][$j]){// lấy sản phẩm đầu tiên trong loại có id là arr[i] hiện tại 
                        foreach($category as $cate){
                            if($cate->getproduct_category_id()==$arr[$i]){
                                if (!$cate_name_displayed)
                                {
                                    echo "<h4 class='cate-name'>".$cate->getproduct_category_name()."</h4>";
                                    $cate_name_displayed = true;
                                }
                                echo "
                                <div id='".$cate->getproduct_category_class_name()."-result-holder' class='result-holder'>
                                    <div class='card pt-card col-6 col-lg-3 float-left border-0'>
                                    <img src='".$product->getproduct_thumbnail()."' class='card-img-top img-product-thumbnail'alt=' '>
                                        <div class='card-body'>
                                            <h5 class='card-title'>".$product->getproduct_name()."</h5>
                                            <p class='card-text'>".number_format($product->getproduct_price(), 0, ",", ".")." đ</p>
                                            <a href= 'details.php?productid=".$product->getproduct_id()."' class='stretched-link'></a>
                                    </div>
                                </div>
                                ";
                            }
                        }
                    }
                    else{
                        if($j==count($arr_[$i])-1 && $product->getproduct_id()==$arr_[$i][$j]){// lấy sản phẩm cuối cùng
                            echo 
                                '<div class="card pt-card col-6 col-lg-3 float-left border-0">
                                    <img src="'.$product->getproduct_thumbnail().'" class="card-img-top img-product-thumbnail" alt="">
                                    <div class="card-body">
                                        <h5 class="card-title">'.$product->getproduct_name().'</h5>
                                        <p class="card-text">'.number_format($product->getproduct_price(), 0, ",", ".").' đ</p>
                                        <a href="details.php?productid='.$product->getproduct_id().'" class="stretched-link"></a>
                                    </div>
                                </div>
                            </div>
                                ';
                        }
                        else{
                            if($product->getproduct_id()==$arr_[$i][$j])
                            echo 
                            '<div class="card pt-card col-6 col-lg-3 float-left border-0">
                                <img src="'.$product->getproduct_thumbnail().'" class="card-img-top img-product-thumbnail" alt="">
                                <div class="card-body">
                                    <h5 class="card-title">'.$product->getproduct_name().'</h5>
                                    <p class="card-text">'.number_format($product->getproduct_price(), 0, ",", ".").' đ</p>
                                    <a href="details.php?productid='.$product->getproduct_id().'" class="stretched-link"></a>
                                </div>
                            </div>
                        ';
                        }
                    }
                }   
                      
                
            }           

        }
      
    }

?>
