<?php

$link = mysqli_connect('127.0.0.1', 'root', 'root', 'memo');

if (mysqli_connect_errno()) {
  die("データベースに接続できません:" . mysqli_connect_error() . "\n");
}

echo "データベースに接続できました \n";

$query = "INSERT INTO article (id, title, body) VALUES (1, 'テスト', 'テスト投稿');";

if (mysqli_query($link, $query)) {
  echo "INSERT に成功しました \n";
}

mysqli_close($link);