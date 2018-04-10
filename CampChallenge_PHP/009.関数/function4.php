<?php
function mypro(){
  echo "名前はまだない。<br>";
  echo "生まれた日もとんとわからぬ。<br>";
  echo "先生に飼われている。<br>";
  return true;
}

$tamesi = mypro();


if($tamesi == true){
  echo "この処理は正しく実行できました。<br>";
}else{
  echo "正しく実行できませんでした。";
}
