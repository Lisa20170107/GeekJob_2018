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

    // ユーザーテーブルから茂を含まれているレコードを取得する
   $sql2 = "SELECT * FROM user WHERE name LIKE '%茂%'";
   $pdo_st = $pdo_obj->prepare($sql2);
   $pdo_st->execute();

   // 実行結果を連想配列で取得（要素が1個の配列の中の、0番目の要素が7個のデータが入った配列になってる）
   $datas = $pdo_st->fetchAll(PDO::FETCH_ASSOC);

  //指定して出す場合。
   echo $datas[0]['name'].'<br>';
   //ループ処理で全て取り出す場合
   foreach ($datas[0] as $a => $b ){
     echo $a."　".$b.'<br>';
   }

   // 取得結果
   var_dump($datas);


    // 切断
    $pdo_obj = null;
  } catch (PDOException $pdo_ex) {
      // 例外発生
      echo 'DB操作で例外が発生。' . $pdo_ex->getMessage();
  }
