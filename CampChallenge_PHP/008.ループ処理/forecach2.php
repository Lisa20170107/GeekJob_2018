<?php

$data1 = array(1, 2, 3, 4, 5, 6, 7, 8, 9);
$date2 = array(1, 2, 3, 4, 5, 6, 7, 8, 9);

$total = 1;
foreach($data1 as $key) {
  if ($key == 5){
    continue;
  }
  echo "$key の段です。"."<br>";
  foreach($date2 as $value){
    $total = $key*$value;
    if ($total % 5 == 0){
      continue;
    }
   echo $total."<br>";
}
if ($total % 7 == 0) {
    break;
 }
}
