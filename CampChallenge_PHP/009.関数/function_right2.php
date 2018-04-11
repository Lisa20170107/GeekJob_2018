<?php

//プロフィールを配列で返却する関数
function make_profile(){
  $infos1 = array();
  $infos1['ID'] = "20180410";
  $infos1['name'] = "猫";
  $infos1['adress'] = "Tokyo";
  $infos1['birth'] = "18/04/10";

  $infos2 = array();
  $infos2['ID'] = "201";
  $infos2['name'] = "太郎";
  $infos2['birth'] = "11/04/10";
  $infos2['adress'] = "Osaka";

  $infos3 = array();
  $infos3['name'] = "魚";
  $infos3['ID'] = "11";
  $infos3['adress'] = "Hukuoka";
  $infos3['birth'] = "09/04/10";

  return array($infos1, $infos2, $infos3);
}

function kensaku($profile,$key){
  //原因①
  foreach ($profile[0] as $a => $b ){
    if(strpos($b,$key) !== false){
       return $profile[0];
    }
    foreach ($profile[1] as $c => $d ){
      if(strpos($d,$key) !== false){
       return $profile[1];
      }
      foreach ($profile[2] as $e => $f ){
        if(strpos($f,$key) !== false){
         $exprofile_03 = str_split($f);
       return $profile[2];

        }
      }
    }
  }
}

//make_profile()の戻り値を確認
var_dump(make_profile());
echo "<br><br>";

$profile = make_profile();
//検索する値を入力する
$search_result = kensaku($profile,"魚");

echo "取得した値は：".'<br>';
echo $search_result['name'].'<br>'; "です。";
echo $search_result['birth'].'<br>';
echo $search_result['adress'].'<br>';
echo "です。".'<br><br>';
var_dump($search_result);
