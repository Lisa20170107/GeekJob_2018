<?php

// 名前の情報
echo $_POST['txtName'];

// 性別の情報

 //もしPOSTに [submit] があれば
if (isset($_POST["submit"])) {
//もし男性なら
if ($_POST["sex"] == "男性") {
echo "男性";
}
//女性なら
elseif ($_POST["sex"] == "女性") {
echo "女性";
}
}

// 趣味の情報
echo $_POST['mulText'];
