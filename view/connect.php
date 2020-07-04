<?php

$link = mysqli_connect('localhost', 'root', 'root', 'article');

if (mysqli_connect_errno()) {
  die("データベースに接続できません:" . mysqli_connect_error() . "\n");
} else {
  echo "データベースの接続に成功しました。\n"; 
}