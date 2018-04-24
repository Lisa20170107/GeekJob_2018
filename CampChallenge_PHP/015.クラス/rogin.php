<!--外観-->
<html>
  <head>
    <title>ログインサンプル</title>
    <meta http-equiv="content-type" charset="utf-8">
  </head>
  <body>
   <p><font size ="3px" color="#008080">ログイン</font></p>
     <form action="./rogin.php" method="post">
      <!-- formタグで括られた入力項目はこれら -->
       <p>e-mail：<input type="text" name="mail"></p>
       <p>パスワード：<input type="text" name="password"></p>
       <input type="submit" name='login' value="ログイン">
     </form>
   </body>
</html>

<?php
//$_POSTにtxtNameが入ってなければ、検索する前にPHPの処理を終了する
if (!isset($_POST['mail'])) { exit; }
// メールの情報
echo $_POST['mail'].'<br>';
// パスワードの情報
echo $_POST['password'].'<br>';
try {
        // 接続文字列生成
    $dns =  'mysql:host=localhost;';
    $dns .= 'dbname=Challenge_db;';
    $dns .= 'charset=utf8';

    // データベースへ接続。
    $pdo_obj = new PDO($dns, 'bm20170107', 'kosmosurtv');
    // エラーモード設定
    $pdo_obj->setAttribute(PDO::ATTR_ERRMODE,
                     PDO::ERRMODE_EXCEPTION);

     //postでの情報取得確認
    $key_mail = $_POST['mail'];
    $key_pass = $_POST['password'];


    // ユーザーアカウントテーブルと、フォームのメールアドレスが一致したらメールアドレスをもらう
    $sql_all = "SELECT mail FROM useraccount WHERE mail = '$key_mail'";
    $pdo_st_all = $pdo_obj->prepare($sql_all);
    $pdo_st_all->execute();

    // 実行結果
     $datas = $pdo_st_all->fetch(PDO::FETCH_ASSOC);
     $datas_mail= $datas['mail'];
     echo $datas_mail;

    // ユーザーアカウントテーブルと、フォームのパスワードが一致したらパスワードをもらう
    $sql_all_2 = "SELECT password FROM useraccount WHERE password = '$key_pass'";
    $pdo_st_all_2 = $pdo_obj->prepare($sql_all_2);
    $pdo_st_all_2->execute();

    // 実行結果
    $datas_2 = $pdo_st_all_2->fetch(PDO::FETCH_ASSOC);
    $datas_pass= $datas_2['password'];


        //ログインボタンが押されたら
        if(isset($_POST['login'])){
        if ($_POST['mail'] == $datas_mail && $_POST['password'] == $datas_pass){
          // もしDBとの入力が一致したら、IDをセッションに保存して、メインのページへ
          session_start();
          $_SESSION["user_name"] = $_POST["mail"];
         header("Location:./main.php");
         exit;
        }
        else{
    // 一致しなかったら
            echo"メールアドレスかパスワードが間違っています。";
                                 }
                             }
    // 切断
    $pdo_obj = null;
  } catch (PDOException $pdo_ex) {
      // 例外発生
      echo 'DB操作で例外が発生。' . $pdo_ex->getMessage();
  }

?>
