<!DOCTYPE html> 
    <html>
         <body>
             <?php
                if($name == "3")
                {
                    $first = false;
                    foreach($special_offers as $special_offer){
                        if(!$first)
                        {
                            echo " 
                            <div class='carousel-item active'>
                                <a href='special_offer.php?special_offer_id=".$special_offer->getspecial_offer_id()."'>
                                    <img class='main-banner-img' src='".$special_offer->getspecial_offer_img()."'>
                                </a>
                            </div>
                            ";
                            $first = true;
                        }
                        else{
                            if($special_offer->getspecial_offer_id() == 2 || $special_offer->getspecial_offer_id() == 3)
                                echo " 
                                <div class='carousel-item'>
                                    <a href='special_offer.php?special_offer_id=".$special_offer->getspecial_offer_id()."'>
                                        <img class='main-banner-img' src='".$special_offer->getspecial_offer_img()."'>
                                    </a>
                                </div>
                                "; 
                        }
                    }
                }
                else
                {
                    if($name=="2"){
                        foreach($special_offers as $special_offer){
                            if($special_offer->getspecial_offer_id()==4)
                            echo " 
                            <a href='special_offer.php?special_offer_id=".$special_offer->getspecial_offer_id()."'>
                            <img style='max-width: 100%; margin-bottom: 1em;' src='".$special_offer->getspecial_offer_img()."'>
                            </a>
                            ";

                            else{
                                if($special_offer->getspecial_offer_id()==5)
                                echo " 
                                <a href='special_offer.php?special_offer_id=".$special_offer->getspecial_offer_id()."'>
                                <img style='max-width: 100%;' src='".$special_offer->getspecial_offer_img()."'>
                                </a>
                                "; 
                            }
                        }
                    }
                }
?>   
        </body> 
     </html>
