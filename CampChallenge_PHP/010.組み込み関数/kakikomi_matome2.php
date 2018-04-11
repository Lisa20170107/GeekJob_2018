<?php
$varArray = array( 2, 3, 5 );
  $result = array_product( $varArray );


$fp = fopen('log.txt', 'a');
  if ($fp != false) {
$func_start = microtime(true);
  $arrTime = explode('.',microtime(true));
    $start_time = date('Y-m-d H:i:s', $arrTime[0]) ."：状況（開始）".'<br>';
        fwrite($fp,$start_time);
        echo $result.'<br>';
$func_end = microtime(true);
  $arrTime2 = explode('.',microtime(true));
    $end_time = date('Y-m-d H:i:s', $arrTime[0])."：状況（終了）".'<br>';
       fwrite($fp, $end_time);
fclose($fp);
}

echo file_get_contents('log.txt');
