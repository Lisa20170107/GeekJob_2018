<?php
// var_dumpで内容を確認
var_dump($_FILES['userfile']);

echo '<br><br>';

// 一時フォルダのファイルをWebアプリの管理下に移動
$files_path = './files/' . $_FILES['userfile']['name'];
// ファイルを移動
if (move_uploaded_file($_FILES['userfile']['tmp_name'],
    $files_path)) {
    // 成功したら、シフトJISからUTF-8に変換
    $data = file_get_contents($files_path);
    $str = mb_convert_encoding($data,"utf-8","sjis");
    // 文字化けが起きない
    echo $str;
}
