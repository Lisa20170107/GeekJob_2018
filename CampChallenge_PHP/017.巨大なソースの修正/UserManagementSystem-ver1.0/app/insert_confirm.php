<?php require_once '../common/defineUtil.php';
      //トップへ戻る
      require_once '../common/scriptUtil.php';

?>
<!DOCTYPE html>
<html lang="ja">

<head>
<meta charset="UTF-8">
      <title>登録確認画面</title>
</head>
  <body>
    <?php
     if(!empty($_POST['name']) && !empty($_POST['year'])&& !empty($_POST['type'])&& !empty($_POST['tell']) && !empty($_POST['comment'])
      //生年月日が------以外だった場合のみ、登録画面へ
       && $_POST['year'] != "----" && $_POST['month'] != "--" && $_POST['day'] != "--"){

        $post_name = $_POST['name'];
        //date型にするために1桁の月日を2桁にフォーマットしてから格納
        $post_birthday = $_POST['year'].'-'.sprintf('%02d',$_POST['month']).'-'.sprintf('%02d',$_POST['day']);
        $post_type = $_POST['type'];
        $post_tell = $_POST['tell'];
        $post_comment = $_POST['comment'];

        //生年月日の初期値用
        $post_year = $_POST['year'];
        $post_month = $_POST['month'];
        $post_day = $_POST['day'];


        //セッション情報に格納
        session_start();
        $_SESSION['name'] = $post_name;
        $_SESSION['birthday'] = $post_birthday;
        $_SESSION['type'] = $post_type;
        $_SESSION['tell'] = $post_tell;
        $_SESSION['comment'] = $post_comment;

        //生年月日の初期値用
        $_SESSION['year'] = $post_year;
        $_SESSION['month'] = $post_month;
        $_SESSION['day'] = $post_day;
    ?>

        <h1>登録確認画面</h1><br>
        名前:<?php echo $post_name;?><br>
        生年月日:<?php echo $post_birthday;?><br>
        種別:<?php echo $post_type?><br>
        電話番号:<?php echo $post_tell;?><br>
        自己紹介:<?php echo $post_comment;?><br>

        上記の内容で登録します。よろしいですか？

        <!-- フォーム内容をhiddenにして、結果画面に直リンクでアクセスされた場合のエラー処理に利用する-->
        <form action="<?php echo INSERT_RESULT ?>" method="POST">
          <input type="hidden" name="OK" value="OK">
          <input type="submit" name="yes" value="はい">
        </form>
        <form action="<?php echo INSERT ?>" method="POST">
            <input type="submit" name="no" value="登録画面に戻る">
        </form>

    <!--ここから入力されなかった項目をユーザーに伝える-->
    <!--もしも誕生日が入力されなかった場合。（最初のifの条件では無かった場合。なので、誕生日以外が空欄でも処理される。）-->
<?php }else{ ?>
     <h1>入力項目が不完全です</h1><br>
     誕生日は必ず選択してください。
     <form action="<?php echo INSERT ?>" method="POST">
         <input type="submit" name="no" value="登録画面に戻る">
     </form>

    <!--もしも名前が入力されなかった場合-->
  <?php }if(empty($_POST['name'])){ ?>
        <h1>入力項目が不完全です</h1><br>
        名前は必ず入力してください。
        <form action="<?php echo INSERT ?>" method="POST">
            <input type="submit" name="no" value="登録画面に戻る">
        </form>
    <!--もしも種別が入力されなかった場合-->
  <?php }if(empty($_POST['type'])){ ?>
          <h1>入力項目が不完全です</h1><br>
          種別は必ず選択してください。
          <form action="<?php echo INSERT ?>" method="POST">
              <input type="submit" name="no" value="登録画面に戻る">
          </form>
        <!--もしも電話番号が入力されなかった場合-->
      <?php }if(empty($_POST['tell'])){ ?>
            <h1>入力項目が不完全です</h1><br>
            電話番号は必ず入力してください。
            <form action="<?php echo INSERT ?>" method="POST">
                <input type="submit" name="no" value="登録画面に戻る">
            </form>
        <!--もしも自己紹介が入力されなかった場合-->
      <?php }if(empty($_POST['comment'])){ ?>
              <h1>入力項目が不完全です</h1><br>
              自己紹介は必ず入力してください。
              <form action="<?php echo INSERT ?>" method="POST">
                  <input type="submit" name="no" value="登録画面に戻る">
              </form>
              <?php }?>
</form>
<br><br>
</body>
</html>
<!--トップへ戻る-->
<?php echo return_top(); ?>
