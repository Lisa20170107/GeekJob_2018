<?php

// クエリストリングから値取得
$num = $_GET["insu"];
// 取得した値を表示
echo "元の値:".$num."<br>";


// ここから素因数分解の処理です！
// シンプルに書いてしまいましょう。

//1以下になるまで繰り返す
while ($num > 1) {
  if($num % 2 == 0){
    //$numを2で割る
    //配列に格納して後で表示しても良いし、表示方法はお任せします。
      $num=$num / 2;
      $result[] = 2;
      }elseif($num % 3 == 0){
      $num=$num/ 3;
      $result[] = 3;
    }elseif($num % 5 == 0){
      $num=$num / 5;
      $result[] = 5;
    }elseif($num % 7 == 0){
      $num=$num/ 7;
      $result[] = 7;
  }else {
    // 1ケタの素数で割り切れなかった場合
    break;
  }
}

// 素数の表示
foreach ($result as $x) {
    echo $x ;
}

echo "<br>";

    // 1ケタの素数で割り切れなかった場合
if ($num > 1) {
    echo "余った値:".$num."<br>";
  }
