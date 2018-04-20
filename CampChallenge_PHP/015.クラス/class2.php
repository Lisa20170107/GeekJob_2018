<?php

// staffクラスの宣言
class Staff {
    // フィールドの宣言
    public $name = '';
    public $age = 0;

    // メソッドの宣言
    public function setHuman($n, $a) {
        // 引数をフィールドへ設定
        $this->name = $n;
        $this->age = $a;

    }
    public function setHuman_hyouji(){
       // 名前と年齢を表示
        echo "名前は". $this->name ."です。<br>";
        echo "年齢は". $this->age ."才です。";
    }

}

// staffクラスのインスタンス生成
$kojin = new Staff();

// kozinnインスタンスのsetStaffメソッドを利用
$kojin->setHuman('田中敦子', 17);

// kozinnインスタンスを表示
$kojin -> setHuman_hyouji();

// classを継承
class nomen extends Staff {
    public function crea() {
      // ２つの変数の中身をクリアするパブリックな関数
        unset($this->name);
        unset($this->age);
    }
}

// 継承を利用して作成したnomenクラスのインスタンスを生成
$human = new nomen();
// humanインスタンスに情報を入れる
$human->setHuman('田中敦子',17);
// humanインスタンスの情報がクリアされる
$human -> crea('田中敦子',17);
// 情報がなにもないのでエラーになる
$human -> setHuman_hyouji();
