<?php

function hikisu($num1,$num2=5,$num3=false){
   if($num3 == true){
     $total = $num1 * $num2;
     echo $total*$total;
   }elseif($num3 == false){
     echo $num1*$num2;
   }
}

hikisu(1,2,false);
