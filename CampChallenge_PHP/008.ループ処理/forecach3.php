<?php

$data1 = array(1, 2, 3, 4, 5, 6, 7, 8, 9);


$total = 1;
foreach($data1 as $key1) {
  if ($key1 == 5){
    continue;
  }
  echo "$key1 の段です。"."<br>";
  //両方とも同じ数字セットを使うため
  foreach($data1 as $key2){
    $total = $key1*$key2;
   echo " " . $total;
}
if ($total % 7 == 0) {
    break;
 }
 echo "<br>";
}
