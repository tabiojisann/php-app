<?php
  $mode = 'input';
  if( isset($_POST['back']) && $_POST['back'] ) {
    // 何もせず
  } else if ( isset($_POST['confirm']) && $_POST['confirm']){
    $mode = 'confirm';
  } else if ( isset($_POST['send']) && $_POST['send']){
    $mode = 'send';
  }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>問合せフォーム</title>
</head>

<body>
  
  <!-- <header></header>
  <div class="title">お問い合わせ</div> -->

  <!-- <form action="./index.php" method="POST">
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
  </form> -->
  
  

  <?php 
    if ( $mode == 'input' ) { ?>
     <form action="./index.php" method="post">
        氏名: <input type="text" name="name" value=""><br>
        Eメール: <input type="email" name="email" value=""><br>
        お問い合わせ内容<br>
        <textarea cols="50" rows="5" name="message"></textarea><br>
        <input type="submit" name="confirm" value="確認" />
      </form>
  <?php } else if( $mode == 'confirm' ) { ?> 
    <form action="./index.php" method="post">
      氏名  <?php echo $_POST['name'] ?><br>
      Eメール  <?php echo $_POST['email'] ?><br>
      お問い合わせ内容<br>  
      <?php echo nl2br($_POST['message']) ?><br>
      <input type="submit" name="back" value="戻る" />
      <input type="submit" name="send" value="送信" />
    </form>
  <?php } else if( $mode == 'send' ) { ?>
    
  <?php } ?>

</body>

</html>

