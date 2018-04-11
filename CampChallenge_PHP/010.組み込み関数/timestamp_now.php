<?php

$today = date('Y/m/d H:i:s');

echo $today .'<br>';

$stamp = mktime(10, 45, 11, 4, 11, 2018);
$hiduke = date('Y-m-d His', $stamp);

echo $hiduke.'<br>';
