<?php
   
    if($name=="all")
    {
        foreach($laptopList as $ll)
        {
           
            foreach($ramlist as $rl)
            {
                if($rl->getproduct_id()==$ll->getproduct_id())
                {
                    $s_ram=$rl->getspec_detail();
                }
            }
            foreach($cpulist as $cl)
            {
                if($cl->getproduct_id()==$ll->getproduct_id())
                {
                    $s_cpu=$cl->getspec_detail();
                }
            }
            echo"
                <div class='card col-6 col-lg-3 float-left border-0'>
                <img src='".$ll->getproduct_thumbnail()."' class='card-img-top img-product-thumbnail' alt='San pham'>
                <div class='card-body'>
                    <h5 class='card-title'>".$ll->getproduct_name()."</h5>
                    <p class='card-text'>Gia: ".number_format($ll->getproduct_price(), 0, ',', '.')."</p>
                    <p class='card-text'>RAM: ".$s_ram."</p>
                    <p class='card-text'>CPU: ".$s_cpu."</p>
                    <a href='details.php?productid=".$ll->getproduct_id()."' class='stretched-link'></a>
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
        foreach($laptopList as $ll)
        {
            $num=($ll->getproduct_price());
            $arr_sort[$a]=(double)$num;
            $a++;
        }
        //
        $arr_price= array();
        $index_arr_price=0;
        if(!$price==null)
        {
            for($j=0;$j<count($price);$j++)
            {
                switch($price[$j]){
                case '<15':
                    for($i=0;$i<count($arr_sort);$i++)
                    {
                        if($arr_sort[$i]<15000000)
                        {
                            $arr_price[$index_arr_price]=$arr_sort[$i];
                            $index_arr_price++;
                        }
                    }
                    break; 
                case '15-20':
                    for($i=0;$i<count($arr_sort);$i++)
                    {
                        if(15000000<=$arr_sort[$i]&&$arr_sort[$i]<20000000)
                        {
                            $arr_price[$index_arr_price]=$arr_sort[$i];
                            $index_arr_price++;
                        }
                    } 
                    break; 
                case '20-30':
                    for($i=0;$i<count($arr_sort);$i++)
                    {
                        if(20000000<=$arr_sort[$i]&&$arr_sort[$i]<=30000000)
                        {
                            $arr_price[$index_arr_price]=$arr_sort[$i];
                            $index_arr_price++;
                        }
                    } 
                    break; 
                case '>30':
                    for($i=0;$i<count($arr_sort);$i++)
                    {
                        if($arr_sort[$i]>30000000)
                        {
                            $arr_price[$index_arr_price]=$arr_sort[$i];
                            $index_arr_price++;
                        }
                    } 
                break;
                }
            }
        }
        else{
            $arr_price=$arr_sort;
        }
        // sort price
        if($minmax==1){
            rsort( $arr_price);
        }
        else{
            if(!$minmax==null)
            {
                sort($arr_price);
            }
        }
        //id product
        $index_id=0;
        for($i=0;$i<count($arr_price);$i++){
            foreach($laptopList as $ll)
            {
                if($arr_price[$i]==$ll->getproduct_price()){
                    $arr_id[$index_id]=$ll->getproduct_id();
                    $index_id++;
                }
            }
        }

        //print product
            for($j=0;$j<count($arr_id);$j++){
                $s_ram=null;
                $s_cpu=null;
                foreach($ramlist as $rl)
                {
                    if($rl->getproduct_id()==$arr_id[$j])
                    {
                        $s_ram=$rl->getspec_detail();
                    }
                }
                foreach($cpulist as $cl)
                {
                    if($cl->getproduct_id()==$arr_id[$j])
                    {
                        $s_cpu=$cl->getspec_detail();
                    }
                }
                if(!$s_ram==null&& !$s_cpu==null){    
                    foreach($laptopList as $ll)
                    {
                        if($ll->getproduct_id()==$arr_id[$j])
                        { 
                            echo"
                                <div class='card col-6 col-lg-3 float-left border-0'>
                                <img src='".$ll->getproduct_thumbnail()."' class='card-img-top img-product-thumbnail' alt='San pham'>
                                <div class='card-body'>
                                    <h5 class='card-title'>".$ll->getproduct_name()."</h5>
                                    <p class='card-text'>Gia: ".number_format($ll->getproduct_price(), 0, ',', '.')."</p>
                                    <p class='card-text'>RAM: ".$s_ram."</p>
                                    <p class='card-text'>CPU: ".$s_cpu."</p>
                                    <a href='details.php?productid=".$ll->getproduct_id()."' class='stretched-link'></a>
                                </div>
                                </div>
                            "; 
                        }
                    }
                }
            }
        }
            
        
    
?>