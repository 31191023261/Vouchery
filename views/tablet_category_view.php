<?php
   
    if($name=="all")
    {
        foreach($tabletList as $tl)
        {
           
           foreach($ramlist as $rl)
           {
               if($rl->getproduct_id()==$tl->getproduct_id())
               {
                   $s_ram=$rl->getspec_detail();
               }
           }
           foreach($bntlist as $bl)
           {
               if($bl->getproduct_id()==$tl->getproduct_id())
               {
                   $s_bnt=$bl->getspec_detail();
               }
           }

            echo"
                <div class='card col-6 col-lg-3 float-left border-0'>
                <img src='".$tl->getproduct_thumbnail()."' class='card-img-top img-product-thumbnail' alt='San pham'>
                <div class='card-body'>
                    <h5 class='card-title'>".$tl->getproduct_name()."</h5>
                    <p class='card-text'>Gia: ".number_format($tl->getproduct_price(), 0, ',', '.')."</p>
                    <p class='card-text'>RAM: ".$s_ram."</p>
                    <p class='card-text'>Bộ nhớ trong: ".$s_bnt."</p>
                    <a href='details.php?productid=".$tl->getproduct_id()."' class='stretched-link'></a>
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
        foreach($tabletList as $tl)
        {
            $num=($tl->getproduct_price());
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
                case '<3':
                    for($i=0;$i<count($arr_sort);$i++)
                    {
                        if($arr_sort[$i]<3000000)
                        {
                            $arr_price[$index_arr_price]=$arr_sort[$i];
                            $index_arr_price++;
                        }
                    }
                    break; 
                case '3-8':
                    for($i=0;$i<count($arr_sort);$i++)
                    {
                        if(3000000<=$arr_sort[$i]&&$arr_sort[$i]<8000000)
                        {
                            $arr_price[$index_arr_price]=$arr_sort[$i];
                            $index_arr_price++;
                        }
                    } 
                    break; 
                case '8-15':
                    for($i=0;$i<count($arr_sort);$i++)
                    {
                        if(8000000<=$arr_sort[$i]&&$arr_sort[$i]<=15000000)
                        {
                            $arr_price[$index_arr_price]=$arr_sort[$i];
                            $index_arr_price++;
                        }
                    } 
                    break; 
                case '>15':
                    for($i=0;$i<count($arr_sort);$i++)
                    {
                        if($arr_sort[$i]>15000000)
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
            foreach($tabletList as $tl)
            {
                if($arr_price[$i]==$tl->getproduct_price()){
                    $arr_id[$index_id]=$tl->getproduct_id();
                    $index_id++;
                }
            }
        }

        //print product
            for($j=0;$j<count($arr_id);$j++){
                $s_ram=null;
                $s_bnt=null;
                foreach($ramlist as $rl)
                {
                    if($rl->getproduct_id()==$arr_id[$j])
                    {
                        $s_ram=$rl->getspec_detail();
                    }
                }
                foreach($bntlist as $bl)
                {
                    if($bl->getproduct_id()==$arr_id[$j])
                    {
                        $s_bnt=$bl->getspec_detail();
                    }
                }
                if(!$s_ram==null&& !$s_bnt==null){    
                    foreach($tabletList as $tl)
                    {
                        if($tl->getproduct_id()==$arr_id[$j])
                        { 
                            echo"
                                <div class='card col-6 col-lg-3 float-left border-0'>
                                <img src='".$tl->getproduct_thumbnail()."' class='card-img-top img-product-thumbnail' alt='San pham'>
                                <div class='card-body'>
                                    <h5 class='card-title'>".$tl->getproduct_name()."</h5>
                                    <p class='card-text'>Gia: ".number_format($tl->getproduct_price(), 0, ',', '.')."</p>
                                    <p class='card-text'>RAM: ".$s_ram."</p>
                                    <p class='card-text'>Bộ nhớ trong: ".$s_bnt."</p>
                                    <a href='details.php?productid=".$tl->getproduct_id()."' class='stretched-link'></a>
                                </div>
                                </div>
                            "; 
                        }
                    }
                }
            }
        }
            
        
    
?>