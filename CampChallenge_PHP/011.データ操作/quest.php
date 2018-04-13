<?php

// 総額
$result_total = $_GET['total']*$_GET['count'];
echo "総額は、".$result_total."円です。".'<br>';
// 個数
echo "個数は、".$_GET['count']."個です。".'<br>';

//種類
echo "種類:";
if($_GET['type']==1){
  echo "雑貨";
}elseif($_GET['type']==2){
  echo "生鮮食品";
}else{
  echo "その他";
}
echo '<br><br>';

// 一個あたりの金額
echo "一個あたりの金額は、" . $_GET['total']/$_GET['count'] ."円です。".'<br>';

// ポイントをつける
if($result_total >= 3000 && $result_total < 4449){
  echo $result_total*0.04 ."ポイントです。".'<br>';
}elseif($result_total >= 5000){
  echo $result_total*0.05 ."ポイントです。".'<br>';
}

// 受け取った情報の確認
var_dump($_GET);
