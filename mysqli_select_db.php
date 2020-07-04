<?php

$link = mysqli_connect('127.0.0.1', 'root', 'root', 'memo');

// 接続状況をチェックします
if (mysqli_connect_errno()) {
    die("データベースに接続できません:" . mysqli_connect_error() . "\n");
}

echo "データベースの接続に成功しました。\n";

// 現在のデータベースを確認します。
current_database($link);

// データベースを shop_grocery に変更します
mysqli_select_db($link, 'mydb');

// 現在のデータベースを確認します。
current_database($link);

// 接続を閉じます
mysqli_close($link);


// 現在の現在のデータベース名を返す関数です。
function current_database($link)
{
    if ($result = mysqli_query($link, "SELECT DATABASE()")) {
        $row = mysqli_fetch_row($result);
        printf("今のデータベースは %s です\n", $row[0]);
        mysqli_free_result($result);
    }
}


