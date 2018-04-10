<?php
//powの修正
for($a=2;$a<21;$a++)
{
  echo pow(8,$a)."<br>";
}

//powを使わない

$total=1;

for($i=0;$i<20;$i++)
{
  $total=$total*8;
  echo $total ."<br>";
}
