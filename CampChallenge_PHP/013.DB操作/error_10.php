<!--HTML部分-->
  <html>
    <head>
      <title>コントロールサンプル</title>
      <meta http-equiv="content-type" charset="utf-8">
    </head>
    <body>
     <p><font size ="3px" color="#008080">入力フォーム</font></p>
       <form action="./error_10.php" method="post">
        <!-- formタグで括られた入力項目はこれら -->
         <p>userID：<input type="text" name="userID"></p>
         <p>名前：<input type="text" name="txtName"></p>
         <p>電話番号：<input type="text" name="tell"></p>
         <p>年齢：<input type="text" name="age"></p>
         <p>誕生日：<input type="text" name="birthday"></p>
         <p>部署<br>(1:開発部<br>2:営業部<br>3:総務部)<br>
           (数字を入力)<input type="text" name="departmentID"></p>
         <p>最寄り駅<br>(1:九段下<br>2:永田町<br>3:渋谷<br>4:神保町<br>5:上井草)<br>
           (数字を入力)<input type="text" name="stationID"></p>
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
      $pdo_obj = new PDO($dns, 'bm20170107', '****');

      // エラーモード設定
      $pdo_obj->setAttribute(PDO::ATTR_ERRMODE,
                       PDO::ERRMODE_EXCEPTION);

    //postでの情報取得確認
    echo "入力された情報は以下になります。".'<br>';
    echo $key_userID = $_POST['userID'];
    echo "<br>";
    echo $key_txtName = $_POST['txtName'];
    echo "<br>";
    echo $key_tell = $_POST['tell'];
    echo "<br>";
    echo $key_age = $_POST['age'];
    echo "<br>";
    echo $key_birthday = $_POST['birthday'];
    echo "<br>";
    echo $key_departmentID = $_POST['departmentID'];
    echo "<br>";
    echo $key_stationID = $_POST['stationID'];


     // ユーザーテーブルへ入力フォームから登録する
    $sql_all = "INSERT INTO user (userID,name,tell,age,birthday,departmentID,stationID)
                          VALUES ('$key_userID','$key_txtName','$key_tell','$key_age','$key_birthday','$key_departmentID','$key_stationID')";
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
