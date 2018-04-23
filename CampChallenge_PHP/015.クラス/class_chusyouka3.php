<?php
// ---- クラス定義を上部にまとめる ---- 添田
//baseクラス
abstract class base{
//load 関数でデータを取得する
 // ---- 引数としてPDOを受け取れる様に追記 ---- 添田
 abstract protected function load($pdo_obj);
 // ---- 引数としてPDOを受け取れる様に追記 ---- 添田
 abstract protected function show($pdo_obj);
}

class Human extends base {
  // tableを隠匿関数にする
  private $table;
  public $datas;
  // 初期化処理
  // ---- 公式サイトの説明がわかり辛いのですが、コンストラクタの_は2つ必要なのです。。。 ---- 添田
  public function __construct(){
    $this -> table = "user2";
  }
    // Humanクラスの処理
    // ---- $pdoにPDOを受け取る ---- 添田
    protected function load($pdo_obj){
    // ユーザーテーブル（人の情報）を全て取得する
    // ---- $this->tableが文字認識される可能性があるため、文字列として連結する形に ---- 添田
    $sql2 = "SELECT * FROM " . $this->table;
    // ---- 受け取ったPDOを使ってDBを検索 ---- 添田
    $pdo_st =  $pdo_obj->prepare($sql2);
    // ---- 以下ですが、ここでexecuteしてるので、Stationと同じ様にfetchAllまでやっちゃうと良いですね！ ---- 添田
    $pdo_st->execute();
    //連想配列でテーブルの情報を受け取る
    $this ->datas = $pdo_st->fetchAll(PDO::FETCH_ASSOC);

  }

    // ---- $pdoにPDOを受け取る ---- 添田
   public function show($pdo_obj){
      // showの中でloadを呼び出し、まずはselectさせる
      $this->load($pdo_obj);
      //ループ処理で全て取り出す場合
      foreach($this->datas as $user) {
       // 1userの各種データを展開
       foreach($user as $a => $b) {
           echo $a. " ".$b."<br>";
       }
       }
     }
  }

class Station extends base {
  // tableを隠匿関数にする
    // ---- 別クラスであれば変数名が同じでもおこられませんので、tableでも大丈夫ですよ ---- 添田
  private $table;
  public $datas_station;
  // ---- 公式サイトの説明がわかり辛いのですが、コンストラクタの_は2つ必要なのです。。。 ---- 添田
  public function __construct(){
     // ---- 下記ですがstation2というテーブル名で合ってますか？ ---- 添田
    $this -> table = "station2";
  }

    // Stationクラスの処理
    // ---- $pdoにPDOを受け取る ---- 添田
    protected function load($pdo_obj){
    // ---- $this->tableが文字認識される可能性があるため、文字列として連結する形に ---- 添田
      $sql2_station = "SELECT * FROM " . $this->table;
    // ---- 受け取ったPDOを使ってDBを検索 ---- 添田
      $pdo_st_station =  $pdo_obj->prepare($sql2_station);
      $pdo_st_station->execute();
      //連想配列でテーブルの情報を受け取る
      $this ->datas_station = $pdo_st_station->fetchAll(PDO::FETCH_ASSOC);
    }

    // ---- $pdoにPDOを受け取る ---- 添田
    public function show($pdo_obj){
      // showの中でloadを呼び出し、まずはselectさせる
      $this->load($pdo_obj);
      //駅の情報をループ処理で取り出す
      foreach($this->datas_station as $sation) {
       // 1userの各種データを展開
       foreach($sation as $c => $d) {
           echo $c. " ".$d."<br>";
       }
       }
     }
}

// ---- クラス定義を上部にまとめる ---- 添田


// ---- ここからメイン処理 ---- 添田
// DBの接続処理をエラーハンドリング
try {
    // ---- 以下でHumanやStationクラスを使って色々やる ---- 添田

    // 接続文字列生成
    $dns =  'mysql:host=localhost;';
    $dns .= 'dbname=Challenge_db;';
    $dns .= 'charset=utf8';

    // データベースへ接続。$pod_objを返す
    $pdo_obj = new PDO($dns, 'bm20170107', 'kosmosurtv');
    // エラーモード設定
    $pdo_obj->setAttribute(PDO::ATTR_ERRMODE,
                     PDO::ERRMODE_EXCEPTION);

//$pdo_objを渡す
  // ---- 添田の指示ミスがありました。以下が正しいです ---- 添田
  // ---- Stationテーブルを取得して表示 ---- 添田
  $st = new Station();
  $st-> show($pdo_obj);

   //クラスを使って表示
  // ---- Humanテーブルを取得して表示 ---- 添田
  $dareka = new Human();
  $dareka-> show($pdo_obj);



    // 切断
  // ---- 良いですね！これ重要です---- 添田
    $pdo_obj = null;
  } catch (PDOException $pdo_ex) {
      // 例外発生
      echo 'DB操作で例外が発生。' . $pdo_ex->getMessage();
  }
