<?php
session_start();
$_SESSION['keyword'] = 'PHP';

$story_command = 0;
if($_POST["battle_command"] == 9)
{
  header("location: vt_list.php");
}
//-------------------------------------------------------//
//PL
$pl_name = $_POST["pl_name"];
$file_path1 = $_POST["file_path"];
//スペック
$attack = $_POST["attack"];
$toughness = $_POST["toughness"];
$speed = $_POST["speed"];
$technic = $_POST["technic"];
$imagination = $_POST["imagination"];
$chase = $_POST["chase"];
$Access_power = $_POST["Access_power"];
$heel_item = $_POST["heel_item"];
//ステータス
$pl_hp_set = $toughness * 2 + 6 ;
$pl_critical = $technic * 3 ;
$pl_round = ($speed+$technic) * 5 + $speed;
$pl_battle = ($attack+$toughness+$technic) * 6;
if($Access_power < $pl_battle){$pl_battle = $Access_power;}
$pl_search = ($technic+$imagination+$chase) * 6;
if($Access_power < $pl_search){$pl_search = $Access_power;}
//-------------------------------------------------------//
//NPC
$enemy_name = $_POST["enemy_name"];
$file_path2 = $_POST["file_path2"];
//スペック
$attack2 = $_POST["attack2"];
$toughness2 = $_POST["toughness2"];
$speed2 = $_POST["speed2"];
$technic2 = $_POST["technic2"];
$imagination2 = $_POST["imagination2"];
$chase2 = $_POST["chase2"];
$Access_power2 = $_POST["Access_power2"];
//-------------------------------------------------------//
//ステータス
$enemy_hp_set = $toughness2 * 2 + 6 ;
$pl_critical2 = $technic2 * 3 ;
$pl_round2 = ($speed2+$technic2) * 5 + $speed2;
$pl_battle2 = ($attack2+$toughness2+$technic2) * 6;
if($Access_power2 < $pl_battle2){$pl_battle2 = $Access_power2;}
$pl_search2 = ($technic2 + $imagination2 + $chase2) * 6;
if($Access_power2 < $pl_search2){$pl_search2 = $Access_power2;}
//-------------------------------------------------------//
//メッセージ定義
$msg = ' ';
$msg1 = ' ';
$msg2 = ' ';
//-------------------------------------------------------//



?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ストーリー作成</title>
  <link rel="icon" href="assets/favicon.ico.png">
  <!--jQuery-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <!--CSS-->
  <!--リセットCSS-->
  <link rel="stylesheet" type="text/css" href="css/reset.css"/>
  <link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>

<body>

<dvi class="straight_line">
    <form enctype="multipart/form-data" action="./file_upload.php" method="POST">
    <h1>キャラクター入力</h1>
    <p>これからストーリーの流れを決めていきます</p>


    <div>
        名前: <input type="text" name="name">
    </div>
        <h1 class="margin_top">イメージ</h1>
        <p>キャラクターの画像を入力してください</p>
        <div class="file-up">
            <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
            <input name="img" type="file" accept="image/*" />
          </div>
          <div>
            <textarea
              name="caption"
              placeholder="キャプション(140文字以下)"
              id="caption"
            ></textarea>
          </div>
          <h1>シンボル</h1>
          <p></p>
          <div class="side_line">
            <select name="symbol">
              <option value="1" selected>戦士</option>
              <option value="2">衛兵</option>
              <option value="3">忍者</option>
              <option value="4">狙撃手</option>
              <option value="5">魔術師</option>
              <option value="6">探偵</option>
              <option value="7">アイドル</option>
              <option value="8">技師</option>
            </select>
          </div>
          <div>
            アイテム名: <input type="text" name="name">
            <div>
            <textarea
              name="caption"
              placeholder="アイテム説明(140文字以下)"
              id="caption"
            ></textarea>
            </div>
          </div>
          <input type="reset" value="リセットする">
          <div>
            <button>作成</button>
          </div>
      </form>
    </dvi>
</body>

</html>