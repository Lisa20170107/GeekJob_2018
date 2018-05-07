<?php
require_once '../common/defineUtil.php';
require_once '../common/scriptUtil.php';
require_once '../common/dbaccesUtil.php';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
      <title>変更入力画面</title>
</head>
<body>
    <form action="<?php echo UPDATE_RESULT ?>" method="GET">
    <?php
    $result = profile_detail($_GET['id']);
    ?>

    名前:
    <input type="text" name="name" value="<?php echo $result[0]['name']; ?>">
    <br><br>

    生年月日:　
    <?php
    //birthday の値を - で区切って表示させる
    $result_birthday = $result[0]['birthday'];
    $birthday_pieces = explode("-", $result_birthday);
    ?>
    <select name="year">
      <?php
       if(!empty($_GET['id'])){?>
         <option value="<?php echo $birthday_pieces[0]; ?>"><?php echo $birthday_pieces[0]; ?></option>
       <?php }?>
        <option value="">----</option>
        <?php
        for($i=1950; $i<=2010; $i++){ ?>
        <option value="<?php echo $i;?>" ><?php echo $i ;?></option>
        <?php } ?>
    </select>年
    <select name="month">
      <?php
       if(!empty($_GET['id'])){?>
         <option value="<?php echo $birthday_pieces[1]; ?>"><?php echo $birthday_pieces[1]; ?></option>
       <?php }?>
        <option value="">--</option>
        <?php
        for($i = 1; $i<=12; $i++){?>
        <option value="<?php echo $i;?>" ><?php echo $i;?></option>
        <?php } ;?>
    </select>月
    <select name="day">
      <?php
       if(!empty($_GET['id'])){?>
         <option value="<?php echo $birthday_pieces[2]; ?>"><?php echo $birthday_pieces[2]; ?></option>
       <?php }?>
        <option value="">--</option>
        <?php
        for($i = 1; $i<=31; $i++){ ?>
        <option value="<?php echo $i; ?>"><?php echo $i;?></option>
        <?php } ?>
    </select>日
    <br><br>

    種別:
    <br>
    <?php
    for($i = 1; $i<=3; $i++){ ?>
    <input type="radio" name="type" value="<?php echo $i; ?>"<?php if($i==$result[0]['type']){echo "checked";}?>><?php echo ex_typenum($i);?><br>
    <?php } ?>
    <br>

    電話番号:
    <input type="text" name="tell" value="<?php echo $result[0]['tell']; ?>">
    <br><br>

    自己紹介文
    <br>
    <textarea name="comment" rows=10 cols=50 style="resize:none" wrap="hard"><?php echo $result[0]['comment']; ?></textarea><br><br>

    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
    <input type="submit" name="btnSubmit" value="以上の内容で更新を行う">
    </form>
    <form action="<?php echo RESULT_DETAIL; ?>" method="GET">
      <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
      <input type="submit" name="NO" value="詳細画面に戻る"style="width:100px">
    </form>
    <?php echo return_top(); ?>
</body>

</html>
