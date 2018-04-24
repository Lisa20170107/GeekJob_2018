<?php
session_start();
//もしセッションにIDが保存されていない場合、ログインページに戻る
if(!isset($_SESSION["user_name"])) {
    header("Location: ./rogin.php");
    exit;
}
echo "ログインに成功しました。会員メールアドレス：".$_SESSION["user_name"];
?>

<!--外観-->
<html>
  <head>
    <title>会員ページサンプル</title>
    <meta http-equiv="content-type" charset="utf-8">
  </head>
  <body>
   <p><font size ="3px" color="#008080">会員ページ</font></p>
    <p><a href="./product_touroku.php">商品登録</a></p>
    <p><a href="./product_list.php">商品一覧</a></p>
    <p><a href="./rogout.php">ログアウトはこちら</a></p>
   </body>
</html>
