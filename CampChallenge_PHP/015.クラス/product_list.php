<!--HTML部分-->
  <html>
    <head>
      <title>コントロールサンプル</title>
      <meta http-equiv="content-type" charset="utf-8">
    </head>
    <body>
     <p><font size ="3px" color="#008080">商品一覧</font></p>
       <form action="./product_list.php" method="post">
        <!-- formタグで括られた入力項目はこれら -->
         <p>商品番号：<input type="text" name="productID"></p>
         <input type="submit" name='kensaku' value="検索">

         <p>商品一覧はこちら:<input type="submit" name='list' value="一覧"></p>
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
      $pdo_obj = new PDO($dns, 'bm20170107', '＊＊＊＊');

      // エラーモード設定
      $pdo_obj->setAttribute(PDO::ATTR_ERRMODE,
      PDO::ERRMODE_EXCEPTION);


      //検索キーワードを受け取る
       $key_kensaku = $_POST['productID'];

        // ユーザーテーブルから検索キーワードで一致したレコードだけ取得する
       $sql2_keyword = "SELECT * FROM product WHERE productID ='$key_kensaku'";
       $pdo_st_keyword = $pdo_obj->prepare($sql2_keyword);
       $pdo_st_keyword->execute();

       // 実行結果を連想配列で取得（要素が1個の配列の中の、0番目の要素が7個のデータが入った配列になってる）
       $datas_keyword = $pdo_st_keyword->fetchAll(PDO::FETCH_ASSOC);

       //もし、検索ボタンが押されたらループ処理で全てを取り出して表示
         foreach($datas_keyword as $user_keyword) {
        // 1userの各種データを展開
       foreach($user_keyword as $c => $d) {
       echo $c. " ".$d."<br>";
       }
       }

       // ユーザーテーブルを全て取得する(一覧用)
      $sql2 = "SELECT * FROM product";
      $pdo_st = $pdo_obj->prepare($sql2);
      $pdo_st->execute();

      // 実行結果を連想配列で取得（要素が1個の配列の中の、0番目の要素が7個のデータが入った配列になってる）
      $datas = $pdo_st->fetchAll(PDO::FETCH_ASSOC);

      //もし、一覧ボタンが押されたらループ処理で全てを取り出して表示
      if(isset($_POST['list'])){
        foreach($datas as $user) {
       // 1userの各種データを展開
      foreach($user as $a => $b) {
      echo $a. " ".$b."<br>";
      }
      }
    }


      // 切断
      $pdo_obj = null;
    } catch (PDOException $pdo_ex) {
        // 例外発生
        echo 'DB操作で例外が発生。' . $pdo_ex->getMessage();
    }
  ?>
