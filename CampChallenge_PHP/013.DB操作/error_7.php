<?php
// DBの接続処理をエラーハンドリング
try {
    // 接続文字列生成
    $dns =  'mysql:host=localhost;';
    $dns .= 'dbname=Challenge_db;';
    $dns .= 'charset=utf8';

    // データベースへ接続
    $pdo_obj = new PDO($dns, 'bm20170107', '＊＊＊＊');

    // エラーモード設定
    $pdo_obj->setAttribute(PDO::ATTR_ERRMODE,
                     PDO::ERRMODE_EXCEPTION);

   // userIDが1の名前・年齢・誕生日を変更
    $sql2 = "UPDATE user SET name = '松岡 修造' WHERE userID =1";
    $pdo_st = $pdo_obj->prepare($sql2);
    $pdo_st->execute();

    $sql2_age = "UPDATE user SET age = 48 WHERE userID =1";
    $pdo_st_age = $pdo_obj->prepare($sql2_age);
    $pdo_st_age->execute();

    $sql2_birthday = "UPDATE user SET birthday = '1967-11-06' WHERE userID =1";
    $pdo_st_birthday = $pdo_obj->prepare($sql2_birthday);
    $pdo_st_birthday->execute();

   // ユーザーテーブルを全て取得する
  $sql_all = "SELECT * FROM user";
  $pdo_st_all = $pdo_obj->prepare($sql_all);
  $pdo_st_all->execute();

   // 実行結果を連想配列で取得（要素が1個の配列の中の、0番目の要素がn個のデータが入った配列になってる）
   $datas = $pdo_st_all->fetchAll(PDO::FETCH_ASSOC);

  //指定して出す場合。
   echo $datas[0]['name'].'<br>';
   //ループ処理で全て取り出す場合
   //ループ処理で全て取り出す場合（5はいなくなるためエラーになる）
   foreach ($datas[0] as $a => $b ){
     echo $a."　".$b.'<br>';
   }foreach ($datas[1] as $c => $d ){
     echo $c."　".$d.'<br>';
   }foreach ($datas[2] as $e => $f ){
     echo $e."　".$f.'<br>';
   }foreach ($datas[3] as $g => $h ){
     echo $g."　".$h.'<br>';
   }foreach ($datas[4] as $i => $j ){
     echo $i."　".$j.'<br>';
   }

   // 取得結果
   var_dump($datas);


    // 切断
    $pdo_obj = null;
  } catch (PDOException $pdo_ex) {
      // 例外発生
      echo 'DB操作で例外が発生。' . $pdo_ex->getMessage();
  }
