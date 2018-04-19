  <!--HTML部分-->
    <html>
      <head>
        <title>コントロールサンプル</title>
        <meta http-equiv="content-type" charset="utf-8">
      </head>
      <body>
       <p><font size ="3px" color="#008080">検索フォーム</font></p>
         <form action="./error_9.php" method="post">
          <!-- formタグで括られた入力項目はこれら -->
           <p>検索：<input type="text" name="txtName"></p>
           <input type="submit" value="送信">
         </form>

       </body>
    </html>
    <?php
    //$_POSTにtxtNameが入ってなければ、検索する前にPHPの処理を終了する
    if (!isset($_POST['txtName'])) { exit; }
    // DBの接続処理をエラーハンドリング
    try {
        // 接続文字列生成
        $dns =  'mysql:host=localhost;';
        $dns .= 'dbname=Challenge_db;';
        $dns .= 'charset=utf8';

        // データベースへ接続
        $pdo_obj = new PDO($dns, 'bm20170107', '*****');

        // エラーモード設定
        $pdo_obj->setAttribute(PDO::ATTR_ERRMODE,
                         PDO::ERRMODE_EXCEPTION);

      //postでの情報取得確認
      $key = $_POST['txtName'];

       // ユーザーテーブルから、検索フォームの文字が部分一致したレコードを取得する
      $sql_all = "SELECT * FROM user WHERE name LIKE '%$key%'";
      $pdo_st_all = $pdo_obj->prepare($sql_all);
      $pdo_st_all->execute();

       // 実行結果を連想配列で取得（要素が1個の配列の中の、0番目の要素がn個のデータが入った配列になってる）
       $datas = $pdo_st_all->fetchAll(PDO::FETCH_ASSOC);
       // $datasから１つの配列を取りだす。1つの配列=1user
       foreach($datas as $user) {
        // 1userの各種データを展開
        foreach($user as $a => $b) {
            echo $a. " ".$b."<br>";
        }
        }

        // 切断
        $pdo_obj = null;
      } catch (PDOException $pdo_ex) {
          // 例外発生
          echo 'DB操作で例外が発生。' . $pdo_ex->getMessage();
      }
    ?>
