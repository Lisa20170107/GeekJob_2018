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

    // ユーザーテーブルを全て取得する
   $sql2 = "SELECT * FROM user";
   $pdo_st = $pdo_obj->prepare($sql2);
   $pdo_st->execute();

   // 実行結果を連想配列で取得
   $datas = $pdo_st->fetchAll(PDO::FETCH_ASSOC);
   // 取得結果
   var_dump($datas);


    // 切断
    $pdo_obj = null;
  } catch (PDOException $pdo_ex) {
      // 例外発生
      echo 'DB操作で例外が発生。' . $pdo_ex->getMessage();
  }
