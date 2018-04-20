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
