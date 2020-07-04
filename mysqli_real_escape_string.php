<?php

$link = mysqli_connect('127.0.0.1', 'root', 'root', 'memo');

// 接続状況をチェックします
if (mysqli_connect_errno()) {
    die("データベースに接続できません:" . mysqli_connect_error() . "\n");
}

echo "データベースの接続に成功しました。\n";

$user = "'s Sato";

// このクエリは失敗します。$user をエスケープしていないからです
if (!mysqli_query($link, "INSERT INTO article (title) VALUES ('$user')")) {
    printf("エラー: %s\n", mysqli_sqlstate($link));
}

// 文字列のエスケープを行います
$user = mysqli_real_escape_string($link, $user);

// $user をエスケープしたので、このクエリは正しく動作します
if (mysqli_query($link, "INSERT INTO article (title) VALUES ('$user')")) {
    printf("%d 行をINSERTしました。\n", mysqli_affected_rows($link));
}

// 接続を閉じます
mysqli_close($link);