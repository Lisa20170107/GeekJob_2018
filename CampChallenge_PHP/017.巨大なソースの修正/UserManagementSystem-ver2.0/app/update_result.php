<?php
require_once '../common/defineUtil.php';
require_once '../common/scriptUtil.php';
require_once '../common/dbaccesUtil.php';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
      <title>更新結果画面</title>
</head>
  <body>
    <?php
    //直リンを禁止する
    if(empty($_GET['id'])){
        echo 'アクセスルートが不正です。もう一度トップページからやり直してください<br>';
    }else{
$name = $_GET['name'];
//date型にするために1桁の月日を2桁にフォーマットしてから格納
$birthday = $_GET['year'].'-'.sprintf('%02d',$_GET['month']).'-'.sprintf('%02d',$_GET['day']);
$type = $_GET['type'];
$tell = $_GET['tell'];
$comment = $_GET['comment'];
$id=$_GET['id'];

 $result = update_profile($name, $birthday, $type, $tell,$comment,$id);
    //エラーが発生しなければ表示を行う
    if(!isset($result)){
    ?>
    <h1>更新確認</h1>
    名前:<?php echo $name;?><br>
    生年月日:<?php echo $birthday;?><br>
    種別:<?php echo ex_typenum($type);?><br>
    電話番号:<?php echo $tell;?><br>
    自己紹介:<?php echo $comment;?><br><br>
    以上の内容で更新しました。<br>
    <?php
    }else{
        echo 'データの更新に失敗しました。次記のエラーにより処理を中断します:'.$result;
    }
  }
    echo return_top();
    ?>
  </body>
</html>
