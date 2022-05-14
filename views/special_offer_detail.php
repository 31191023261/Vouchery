<!DOCTYPE html> 
    <html>
         <body>
                <?php
                        foreach($special_offer as $so){
                            echo " ".$so->getspecial_offer_details().""; 
                        }
                ?>   
        </body> 
     </html>
