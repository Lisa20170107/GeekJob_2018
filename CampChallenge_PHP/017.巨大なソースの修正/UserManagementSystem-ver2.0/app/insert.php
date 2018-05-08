<?php require_once '../common/defineUtil.php'; ?>
<?php require_once '../common/scriptUtil.php'; ?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
      <title>登録画面</title>
</head>
<body>
    <?php session_start();//再入力時用

    // 初期値設定
    // 名前
    if(isset ($_SESSION['name'])){
    $text=$_SESSION['name'];
    }else{
    $text="";
    }

    // 生年月日
    //年
    if(isset ($_SESSION['year'])){
    $year=$_SESSION['year'];
    }else{
    $year="";
    }

    //月
    if(isset ($_SESSION['month'])){
    $month=$_SESSION['month'];
    }else{
    $month="";
    }

    //日
    if(isset ($_SESSION['day'])){
    $day=$_SESSION['day'];
    }else{
    $day="";
    }

    // 電話番号
    if(isset ($_SESSION['tell'])){
    $tell=$_SESSION['tell'];
    }else{
    $tell="";
    }

    // 自己紹介
    if(isset ($_SESSION['comment'])){
    $comment=$_SESSION['comment'];
    }else{
    $comment="";
    }

    ?>
    <form action="<?php echo INSERT_CONFIRM ?>" method="POST">

      名前:
      <input type="text" name="name" value=<?php echo $text ?>>
      <br><br>

      生年月日:
      <select name="year">
        <!--二回目以降、セッションに保存されている年月日を表示させる-->
        <?php
         if(!empty($_SESSION['year'])){?>
           <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
         <?php }?>
          <option value="----" >----</option>
          <?php
          for($i=1950; $i<=2010; $i++){ ?>
          <option value="<?php echo $i;?>"><?php echo $i ;?></option>
          <?php } ?>
      </select>年
      <select name="month">
        <?php
         if(!empty($_SESSION['month'])){?>
           <option value="<?php echo $month; ?>"><?php echo $month; ?></option>
         <?php }?>
          <option value="--">--</option>
          <?php
          for($i = 1; $i<=12; $i++){?>
          <option value="<?php echo $i;?>"><?php echo $i;?></option>
          <?php } ;?>

              </select>月
      <select name="day">
        <?php
         if(!empty($_SESSION['day'])){?>
           <option value="<?php echo $day; ?>"><?php echo $day; ?></option>
         <?php }?>
          <option value="--">--</option>
          <?php
          for($i = 1; $i<=31; $i++){ ?>
          <option value="<?php echo $i; ?>"><?php echo $i;?></option>
          <?php } ?>
      </select>日
      <br><br>

      種別:
      <br>
      <input type="radio" name="type" value="1"
      <?php
      //初回時、何も入力してない時は、エンジニアにチェックが入る。他は空欄にする。
      if (empty($_SESSION['type'])){ echo 'checked';}
      elseif($_SESSION['type'] == "1"){echo 'checked';}
      ?>>エンジニア<br>
      <input type="radio" name="type" value="2"
      <?php
      if (empty($_SESSION['type'])){ echo "";}
      elseif($_SESSION['type'] == "2"){echo 'checked';}?>>営業<br>
      <input type="radio" name="type" value="3"
      <?php
      if (empty($_SESSION['type'])){ echo "";}
      elseif($_SESSION['type'] == "3"){echo 'checked';}?>>その他<br>
      <br>

      電話番号:
      <input type="text" name="tell" value=<?php echo $tell ?>>
      <br><br>

      自己紹介文
      <br>
      <textarea name="comment" rows=10 cols=50 style="resize:none" wrap="hard"><?php echo $comment ?></textarea><br><br>

        <input type="hidden" name="mode"  value="CONFIRM">
        <input type="submit" name="btnSubmit" value="確認画面へ">
    </form>

    <?php echo return_top(); ?>
</body>
</html>
