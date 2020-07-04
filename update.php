<?php

$link = mysqli_connect('127.0.0.1', 'root', 'root', 'memo');

// 接続状況をチェックします
if (mysqli_connect_errno()) {
    die("データベースに接続できません:" . mysqli_connect_error() . "\n");
}

echo "データベースの接続に成功しました。\n";

// id=1のレコードを更新する
$query = "UPDATE article SET title = '更新', body = 'UPDATEテスト' WHERE id = 2;";

// クエリを実行します。
if (mysqli_query($link, $query)) {
    echo "UPDATE に成功しました。\n";
}

// 接続を閉じます
mysqli_close($link);


