<?php
// DBの接続処理をエラーハンドリング
try {
    // 接続文字列生成
    $dns =  'mysql:host=localhost;';
    $dns .= 'dbname=Challenge_db;';
    $dns .= 'charset=utf8';

    // データベースへ接続
    $pdo_obj = new PDO($dns, 'bm20170107', '＊＊＊＊');

    // user テーブルにメンバーを追加
    $sql = "INSERT INTO user (userID,name,tell,age,birthday,departmentID,stationID)
                       VALUES (6,'福沢 諭吉','1192-1192','30','1986-02-01',3,1)";
    $stmt = $pdo_obj->prepare($sql);
    $stmt->execute();

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
    echo 'DB接続に失敗しました。' . $pdo_ex->getMessage();
}
