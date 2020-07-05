<?php
  session_start();
  $mode = 'input';
  if( isset($_POST['back']) && $_POST['back'] ) {
    // 何もせず
  } else if ( isset($_POST['confirm']) && $_POST['confirm']){
    $_SESSION['name']    = $_POST['name'];
    $_SESSION['email']   = $_POST['email'];
    $_SESSION['message'] = $_POST['message'];
    $mode = 'confirm';
  } else if ( isset($_POST['send']) && $_POST['send']){
    $message = "お問い合わせを受け付けました。\r\n"
             . "名前: " . $_SESSION['name'] . "\r\n"
             . "email: " . $_SESSION['email'] . "\r\n"
             . "お問い合わせ内容:\r\n"
             . preg_replace("/\r\n|\r|\n/", "\r\n", $_SESSION['message']);
    mail($_SESSION['email'], "お問い合わせいただきありがとうございます", $message);
    mail('aaa@gmail.com', "お問い合わ  せいただきありがとうございます", $message);
    $_SESSION = array();
    $mode = 'send'; 
  } else {
    $_SESSION = array();
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

  <?php 
    if ( $mode == 'input' ) { ?>
     <form action="./index.php" method="post">
        氏名: <input type="text" name="name" value="<?php echo $_SESSION['name'] ?>"><br>
        Eメール: <input type="email" name="email" value="<?php echo $_SESSION['email'] ?>"><br>
        お問い合わせ内容<br>
        <textarea cols="50" rows="5" name="message"><?php echo $_SESSION['name'] ?></textarea><br>
        <input type="submit" name="confirm" value="確認" />
      </form>
  <?php } else if( $mode == 'confirm' ) { ?> 
    <form action="./index.php" method="post">
      氏名  <?php echo $_SESSION['name'] ?> <br>
      Eメール  <?php echo $_SESSION['email'] ?><br>
      お問い合わせ内容<br>  
      <?php echo nl2br($_SESSION['message']) ?><br>
      <input type="submit" name="back" value="戻る" />
      <input type="submit" name="send" value="送信" />
    </form>
  <?php } else if( $mode == 'send' ) { ?>
    送信しました<br>
    <form action="./index.php" method="post">
    <input type="submit" name="back" value="戻る" />
    </form>
  <?php } ?>

</body>

</html>
