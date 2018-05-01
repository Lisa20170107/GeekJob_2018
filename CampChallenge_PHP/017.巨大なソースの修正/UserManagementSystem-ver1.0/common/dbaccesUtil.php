<?php
require_once '../common/scriptUtil.php';


//DBへの接続用を行う。成功ならPDOオブジェクトを、失敗なら中断、メッセージの表示を行う
function connect2MySQL(){
    try{
        $pdo = new PDO('mysql:host=localhost;dbname=Challenge_db;charset=utf8','bm20170107','****');
        return $pdo;

        // エラーモード設定
        $pdo->setAttribute(PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION);

    } catch (PDOException $e) {
        die('接続に失敗しました。次記のエラーにより処理を中断します:'. $e->getMessage());
            }
}

//DBへフォームに入力されたものを登録させる
function insert_MySQL(){

    //DBに全項目のある1レコードを登録するSQL
  $insert_sql = "INSERT INTO use_r(name,birthday,tell,type,comment,newDate)"
            . "VALUES(:name,:birthday,:tell,:type,:comment,:newDate)";
            return $insert_sql;
}

 //SQL文にセッションから受け取った値＆現在時をバインド
function query_MySQL($insert_query,$name,$birthday,$type,$tell,$comment){

 $insert_query->bindValue(':name',$name);
 $insert_query->bindValue(':birthday',$birthday);
 $insert_query->bindValue(':tell',$tell);
 $insert_query->bindValue(':type',$type);
 $insert_query->bindValue(':comment',$comment);
 $insert_query->bindValue(':newDate',date('Y/m/d H:i:s'));

 return $insert_query;

 }
