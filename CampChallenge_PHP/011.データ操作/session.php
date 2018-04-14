<?php

// セッション開始
session_start();

// ユーザーのアクセス日時を保存する処理
// ユーザーの１回目の訪問
$access_time = date('Y年m月d日H時');
$_SESSION['LastLoginDate']= $access_time;

// ユーザーのアクセス日時を表示する処理
echo '前回のアクセス日時：' . $_SESSION['LastLoginDate'];
