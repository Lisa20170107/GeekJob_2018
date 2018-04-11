<?php

$fp = fopen('sample.txt', 'w');

if ($fp != false) {

    fwrite($fp, '吾輩は猫である。名前はまだない');

    fclose($fp);
}
