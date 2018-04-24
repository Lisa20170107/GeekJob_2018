<?php

// セッション開始
session_start();
// セッション変数を全て削除
$_SESSION = array();
// セッションの登録データを削除
session_destroy();
echo "ログアウトしました。";
?>
<html>
  <head>
    <title>コントロールサンプル</title>
    <meta http-equiv="content-type" charset="utf-8">
  </head>
  <body>
     <p><a href="./main.php">会員ページ</a></p>
   </body>
</html>
