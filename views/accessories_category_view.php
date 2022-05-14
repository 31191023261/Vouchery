<?php
  
    if($name=="all")
    {
        foreach($accessoriesList as $al)
        {
            echo"
                <div class='card col-6 col-lg-3 float-left border-0'>
                <img src='".$al->getproduct_thumbnail()."' class='card-img-top img-product-thumbnail' alt='San pham'>
                <div class='card-body'>
                    <h5 class='card-title'>".$al->getproduct_name()."</h5>
                    <p class='card-text'>Gia: ".number_format($al->getproduct_price(), 0, ',', '.')."</p>
                    <a href='details.php?productid=".$al->getproduct_id()."' class='stretched-link'></a>
                </div>
                </div>
                "; 
            }
    }
    else{
        $arr_sort= array();
        $arr_id= array();
        $a=0;
        // add price to array
        foreach($accessoriesList as $al)
        {
            $num=($al->getproduct_price());
            $arr_sort[$a]=(double)$num;
            $a++;
        }
        // sort price
        if($minmax==1){
            rsort( $arr_sort);
        }
        else{
            if(!$minmax==null)
            {
                sort($arr_sort);
            }
        }
        //print product
            for($j=0;$j<count($arr_sort);$j++)
            {    
                foreach($accessoriesList as $al)
                {
                    if($al->getproduct_price()==$arr_sort[$j])
                    { 
                        echo"
                            <div class='card col-6 col-lg-3 float-left border-0'>
                            <img src='".$al->getproduct_thumbnail()."' class='card-img-top img-product-thumbnail' alt='San pham'>
                            <div class='card-body'>
                                <h5 class='card-title'>".$al->getproduct_name()."</h5>
                                <p class='card-text'>Gia: ".number_format($al->getproduct_price(), 0, ',', '.')."</p>
                                <a href='details.php?productid=".$al->getproduct_id()."' class='stretched-link'></a>
                            </div>
                            </div>
                        "; 
                    }
                }
            }
    }
    
            
        
    
?>