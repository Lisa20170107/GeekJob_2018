<?php

function br(){
echo nl2br("\n"); //<br />タグが挿入される。
}

$num1 = 12;
$num2 = 26;
$num3 = 79;
$num4 = 84;

echo ++$num1;
br();
echo $num2++;
br();
echo $num2;
br();
echo --$num3;
br();
echo $num4--;
br();
echo $num4;
