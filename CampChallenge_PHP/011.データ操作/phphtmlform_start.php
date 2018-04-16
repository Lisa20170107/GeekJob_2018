<!DOCTYPE HTML>
  <head>
    <title>コントロールサンプル</title>
    <meta http-equiv="content-type" charset="utf-8">
  </head>
  <body>
    <?php
    // 初期値設定
    // 名前
     session_start();
     if(isset ($_SESSION['s_name'])){
    $txtName=$_SESSION['s_name'];
    }else{
    $txtName="";
    }

    // 趣味
   if(isset ($_SESSION['s_hobby'])){
   $mulText=$_SESSION['s_hobby'];
   }else{
   $mulText="";
   }

   ?>


<!-- 以下アンケートフォーム -->
   <p><font size ="3px" color="#008080">アンケートフォーム</font></p>
     <form action="./phphtmlform.php" method="post">
      <!-- formタグで括られた入力項目はこれら -->
       <p>名前：<input type="text" name="txtName" value=<?php echo $txtName ?>></p>
       <p>性別</p>
       <!-- 初期値は前回アクセスした時のものをチェックする -->
       <input type="radio" name="rdoSample" value="男性"
       <?php if($_SESSION['s_sex'] == "男性"){echo 'checked';}?>
       >男性
       <input type="radio" name="rdoSample" value="女性"
       <?php if($_SESSION['s_sex'] == "女性"){echo 'checked';}?>
       >女性
       <p>趣味</p><textarea name="mulText"><?php echo $mulText ?></textarea>
       <input type="submit" value="送信">
     </form>
   </body>
</html>
