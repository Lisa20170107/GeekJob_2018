<!--HTML部分-->
  <html>
    <head>
      <title>コントロールサンプル</title>
      <meta http-equiv="content-type" charset="utf-8">
    </head>
    <body>
     <p><font size ="3px" color="#008080">削除フォーム</font></p>
     <p>削除したいメンバーのuserIDを入力してください。</p>
       <form action="./error_11.php" method="post">
        <!-- formタグで括られた入力項目はこれら -->
         <p>userID：<input type="text" name="userID"></p>
         <input type="submit" value="送信">
       </form>

     </body>
  </html>
  <?php
  //$_POSTにtxtNameが入ってなければ、検索する前にPHPの処理を終了する
  if (!isset($_POST['userID'])) { exit; }
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
    echo "入力された以下の番号のメンバーを削除します。".'<br>';
    echo $key_userID = $_POST['userID'];

     // ユーザーテーブルへ入力フォームから削除する
    $sql_all = "DELETE FROM user WHERE userID = $key_userID";

    $pdo_st_all = $pdo_obj->prepare($sql_all);
    // もし、削除が完了されたら「完了しました」と表示させる
    if($pdo_st_all->execute()){
      echo "<br>";
      echo "削除が完了しました。";
    }


      // 切断
      $pdo_obj = null;
    } catch (PDOException $pdo_ex) {
        // 例外発生
        echo 'DB操作で例外が発生。' . $pdo_ex->getMessage();
    }
  ?>
