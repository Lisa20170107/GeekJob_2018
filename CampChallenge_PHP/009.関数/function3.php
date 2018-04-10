<?php

function make_profile(){
  $infos1 = array();
$infos['ID'] = "20180410";
$infos['name'] = "猫";
$infos['birth'] = "18/04/10";
$infos['adress'] = "Tokyo";

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

$kensaku='魚';

if(in_array('$kensaku',$infos1)){
  echo $infos1;
}
if(in_array('$kensaku',$infos2)){
  echo $infos2;
}
if(in_array('$kensaku',$infos3)){
  echo $infos3;
}
  return $kensaku;
  }


$myprof = make_profile();

echo $myprof['name'].'<br>';
echo $myprof['birth'].'<br>';
echo $myprof['adress'].'<br>';
