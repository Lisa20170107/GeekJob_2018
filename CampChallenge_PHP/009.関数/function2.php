<?php
function make_profile(){
$infos = array();
$infos['ID'] = "20180410";
$infos['name'] = "猫";
$infos['birth'] = "18/04/10";
$infos['adress'] = "Tokyo";
return $infos;
}

$myprof = make_profile();
echo $myprof['name'].'<br>';
echo $myprof['birth'].'<br>';
echo $myprof['adress'].'<br>';
