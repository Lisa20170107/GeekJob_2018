<?php
// DBの接続処理をエラーハンドリング
try {
    // 接続文字列生成
    $dns =  'mysql:host=localhost;';
    $dns .= 'dbname=Challenge_db;';
    $dns .= 'charset=utf8';

    // データベースへ接続
    $pdo_obj = new PDO($dns, 'bm20170107', '＊＊＊＊');

    // 切断
    $pdo_obj = null;
} catch (PDOException $pdo_ex) {
    // 例外発生
    echo 'DB接続に失敗しました。' . $pdo_ex->getMessage();
}

//PODのエラーモード設定
try {

    $pdo_obj = new PDO($dns, 'bm20170107', '＊＊＊＊＊');
    // エラーモード設定
    $pdo_obj->setAttribute(PDO::ATTR_ERRMODE,
                         PDO::ERRMODE_EXCEPTION);
    // SQL文生成（存在しないテーブル）
    $sql = 'SELECT * FROM misstable';
    $pdo_st = $pdo_obj->prepare($sql);
    $pdo_st->execute();    // 例外発生
    // … 以下処理省略
} catch (PDOException $pdo_ex) {
    echo 'DB操作で例外が発生。' . $pdo_ex->getMessage();
}
