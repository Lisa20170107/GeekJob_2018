<?php
// セッションのスタート
session_start();

// 名前の情報をセッションに入れる
$name = $_POST['txtName'];
$_SESSION['s_name'] = $name;
echo $_SESSION['s_name'].'<br>';

// 性別の情報をセッションに入れる
$sex = $_POST['rdoSample'];
$_SESSION['s_sex'] = $sex;
echo $_SESSION['s_sex'].'<br>';

// 趣味の情報
$hobby = $_POST['mulText'];
$_SESSION['s_hobby'] = $hobby;
echo $_SESSION['s_hobby'].'<br>';

// 受け取った情報の確認
var_dump($_POST);
