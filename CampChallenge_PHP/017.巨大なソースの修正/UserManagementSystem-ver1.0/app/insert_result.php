<?php require_once '../common/scriptUtil.php';
     //もしもinsert_confirmのページで登録ボタンを押さなかったらエラー文を出す
if(isset($_POST['hidden'])){
  echo "トップページに戻ってください。";
  exit;
}

?>

<?php require '../common/dbaccesUtil.php'; ?>

<!DOCTYPE html>
<html lang="ja">

<head>
<meta charset="UTF-8">
      <title>登録結果画面</title>
</head>
<body>

    <?php
    session_start();
    $name = $_SESSION['name'];
    $birthday = $_SESSION['birthday'];
    $type = $_SESSION['type'];
    $tell = $_SESSION['tell'];
    $comment = $_SESSION['comment'];

    //db接続を確立
    $insert_db = connect2MySQL();

    //insert の処理
    $insert_result = insert_MySQL();

    //クエリとして用意
    $insert_query = $insert_db->prepare($insert_result);

    //SQL文にセッションから受け取った値＆現在時をバインド
    $insert_query =query_MySQL($insert_query,$name,$birthday,$type,$tell,$comment);

     //SQLを実行
     try{  $insert_query->execute();
     }catch (PDOException $e) {
         echo 'データの挿入に失敗しました:'. $e->getMessage();

   }

    //直前に格納されたレコードの行数を取得する（データが格納されたかの確認用
    $count=$insert_query->rowCount();

    //接続オブジェクトを初期化することでDB接続を切断
    $insert_db=null;

    //格納されたレコードがあれば登録画面を表示
    if($count == '1'){

    ?>

    <h1>登録結果画面</h1><br>
    名前:<?php echo $name;?><br>
    生年月日:<?php echo $birthday;?><br>
    種別:<?php echo $type?><br>
    電話番号:<?php echo $tell;?><br>
    自己紹介:<?php echo $comment;?><br>
    以上の内容で登録しました。<br>
    <!--もしもSQL文に失敗したら、エラー文が表示される-->
  <?php }else{
    echo "データの挿入に失敗しました。";
  } ?>


    ?>

    <h1>登録結果画面</h1><br>
    名前:<?php echo $name;?><br>
    生年月日:<?php echo $birthday;?><br>
    種別:<?php echo $type?><br>
    電話番号:<?php echo $tell;?><br>
    自己紹介:<?php echo $comment;?><br>
    以上の内容で登録しました。<br>
    <!--もしもSQL文に失敗したら、エラー文が表示される-->


<br><br>

</body>

</html>
<!--トップへ戻る-->
<?php echo return_top(); ?>
