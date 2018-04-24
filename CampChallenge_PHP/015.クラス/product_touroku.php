<!--HTML部分-->
  <html>
    <head>
      <title>コントロールサンプル</title>
      <meta http-equiv="content-type" charset="utf-8">
    </head>
    <body>
     <p><font size ="3px" color="#008080">商品登録フォーム</font></p>
       <form action="./product_touroku.php" method="post">
        <!-- formタグで括られた入力項目はこれら -->
         <p>商品番号：<input type="text" name="productID"></p>
         <p>商品名：<input type="text" name="name"></p>
         <p>製造年月日：<input type="text" name="madedate"></p>
         <p>発売日：<input type="text" name="releasedate"></p>
         <p>値段：<input type="text" name="price"></p>
         <input type="submit" value="登録">
       </form>
       <p><a href="./main.php">会員ページ</a></p>

     </body>
  </html>
  <?php
  session_start();
  //もしセッションにIDが保存されていない場合、ログインページに戻る
  if(!isset($_SESSION["user_name"])) {
      header("Location: ./rogin.php");
      exit;
  }
  //$_POSTにtxtNameが入ってなければ、検索する前にPHPの処理を終了する
  if (!isset($_POST['productID'])) { exit; }
  // DBの接続処理をエラーハンドリング
  try {
      // 接続文字列生成
      $dns =  'mysql:host=localhost;';
      $dns .= 'dbname=Challenge_db;';
      $dns .= 'charset=utf8';

      // データベースへ接続
      $pdo_obj = new PDO($dns, 'bm20170107', 'kosmosurtv');

      // エラーモード設定
      $pdo_obj->setAttribute(PDO::ATTR_ERRMODE,
                       PDO::ERRMODE_EXCEPTION);

    //postでの情報取得確認
    echo "入力された情報は以下になります。".'<br>';
    echo $key_productID = $_POST['productID'];
    echo "<br>";
    echo $key_name = $_POST['name'];
    echo "<br>";
    echo $key_madedate = $_POST['madedate'];
    echo "<br>";
    echo $key_releasedate = $_POST['releasedate'];
    echo "<br>";
    echo $key_price = $_POST['price'];
    echo "<br>";


     // ユーザーテーブルへ入力フォームから登録する
    $sql_all = "INSERT INTO product (productID,name,madedate,releasedate,price)
                          VALUES ('$key_productID','$key_name','$key_madedate','$key_releasedate','$key_price')";
    $pdo_st_all = $pdo_obj->prepare($sql_all);
    // もし、登録が完了されたら「完了しました」と表示させる
    if($pdo_st_all->execute()){
      echo "<br>";
      echo "登録が完了しました。";
    }


      // 切断
      $pdo_obj = null;
    } catch (PDOException $pdo_ex) {
        // 例外発生
        echo 'DB操作で例外が発生。' . $pdo_ex->getMessage();
    }
  ?>
