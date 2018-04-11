<?php
$string='きょUはぴIえIちぴIのくみこみかんすUのがくしゅUをしてIます';
$pattern=array("/I/","/U/");
$replace=array('い','う');
$result=preg_replace($pattern, $replace, $string);

echo $result;
