<?php
  session_start();

  require('connect.php');

  $posts = $db->query('SELECT * FROM article ORDER BY DESC')
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>php memo</title>
</head>
<body>
  <header></header>
   <form action="./index.php" method="POST">
    <ul>
      <li>
        <input type="text" placeholder="タイトルを入力">
      </li>
      <li>
        <textarea></textarea>
      </li>
      <li>
        <button type="submit">投稿</button>
      </li>
    </ul>
  </form> 

  <?php foreach ($posts as $post): ?>
    <p>(<?php print(htmlspecialchars($post['title'], ENT_QUOTES)); ?>)</p>
  <?php endforeach ?>
</body>
</html>