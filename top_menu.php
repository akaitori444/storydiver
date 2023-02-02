<?php
session_start();
$_SESSION['keyword'] = 'PHP';

$story_command = 0;
if($_POST["battle_command"] == 9)
{
  header("location: vt_list.php");
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>VisionsTale</title>
  <link rel="icon" href="assets/favicon.ico.png">
  <!--jQuery-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <!--CSS-->
  <!--リセットCSS-->
  <link rel="stylesheet" type="text/css" href="css/reset.css"/>
  <link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>

<body>
<h1>VisionsTale</h1>
<p>あなただけのキャラクターであなただけの物語を冒険しよう</P>
<!-- 選択ボタン -->
<button onclick="location.href='vt_list.php'">お話を遊ぶ</button>
<button onclick="location.href='story_make.php'">お話を作る</button>
<button onclick="location.href='upkoad_from.php'">キャラを作る</button>
<button onclick="location.href='vt_list.php'">キャラを見る</button>

</body>

</html>