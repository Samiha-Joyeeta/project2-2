<?php

function component($propertyname, $propertyprice, $propertyimg, $propertyid){
    $element = "
    <div class=\"col-md-6 col-sm-6 col-xs-12\">
        <div class=\"hovereffects\">

     <form action=\"sale-menu.php\" method=\"post\">
    
   

             <img src=\"$propertyimg\" width=\"100%\" height=\"300px\" alt=\"Food\">
             <div class=\"overlay\">
                <h3> $propertyname </h3>

        </div>
        </form>
        </div>
        </div>




        
    ";
    echo $element;
}



function cartElement($propertyimg, $propertyname, $propertyprice, $propertyid){
    $element = "
    
    <form action=\"cart.php?action=remove&id=$propertyid\" method=\"post\" class=\"cart-items\">
                    <div class=\"border rounded\">
                        <div class=\"row bg-white\">
                            <div class=\"col-md-3 pl-0\">
                                <img src=$propertyimg alt=\"Image1\" class=\"img-fluid\">
                            </div>
                            <div class=\"col-md-6\">
                                <h5 class=\"pt-2\">$propertyname</h5>

                               <h5 class=\"pt-2\">$propertyprice</h5>
                               
                                <button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remove\">Remove</button>
                            </div>
                            <div class=\"col-md-3 py-5\">
                                <div>
                                    
                                   
                                   
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </form>




    
    ";
    echo  $element;
}