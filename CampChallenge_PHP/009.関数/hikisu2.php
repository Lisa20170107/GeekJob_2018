<?php

function hikisu($num1,$num2=5,$num3="false"){
   if($num3 == "true"){
     $total = $num1 * $num2;
     echo $total*$total;
   }else{
     echo "falseです。";
   }
}

hikisu(1,2,"A");
