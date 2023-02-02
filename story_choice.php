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
  <title>ストーリー選択</title>
  <link rel="icon" href="assets/favicon.ico.png">
  <!--jQuery-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <!--CSS-->
  <!--リセットCSS-->
  <link rel="stylesheet" type="text/css" href="css/reset.css"/>
  <link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>

<body>

  <div class="window">
    <!--NPCステータス-->
    <h1>NPCステータス</h1>
    <div class="status">
    <p>PLキャラ名: <?=$pl_name?></p>
    <p>敵キャラ名: <?=$enemy_name?></p>
    <p>にぎやかし: <?=$enemy_name?></p>
    </div>
  </div>

    <!--戦闘画面-->
    <div class="gm_information">
      <div class="main_window">
        <div>戦闘画面</div>
        <!--敵画面-->
        <div class="straight_line">
          <div class="battlefield">
            <img src="<?=$enemy_images?>" alt="enemyサンプル" width="100" height="100">
          </div>
          <p><?=$enemy_name?>のHP : <?=$enemy_hp?></p>
          <meter id="fuel"
                  min="0" max="<?=$enemy_hp_set?>"
                  value="<?=$enemy_hp?>">
                at <?=$enemy_hp?>/<?=$enemy_hp_set?>
          </meter>
          <p><?=$enemy_name?>の接続率 : <?=$enemy_Access?>%</p>
          <!--
          <meter id="fuel"
                min="0" max="<?=$Access_power2?>"
                value="<?=$enemy_Access?>">
              at <?=$enemy_Access?>/<?=$Access_power2?>
          </meter>
          -->
        </div>
        <div class="vs">VS</div>
        <!--敵画面-->
        <div class="straight_line">
          <div class="battlefield">
            <img src="<?=$pl_images?>" alt="PLサンプル" width="100" height="100">
          </div>
          <p><?=$pl_name?>のHP : <?=$pl_hp?></p>
          <meter id="fuel"
                min="0" max="<?=$pl_hp_set?>"
                value="<?=$pl_hp?>">
              at <?=$pl_hp?>/<?=$pl_hp_set?>
          </meter>
          <p><?=$pl_name?>の接続率 : <?=$Access_power?>%</p>
          <!--
          <meter id="fuel"
                min="0" max="<?=$Access_power?>"
                value="<?=$Access_power?>">
              at <?=$Access_power?>/<?=$Access_power?>
          </meter>
          -->
        </div>
      </div>
      <div class="msg_window">
        <div>メッセージ</div>
        <div><?=$msg?></div>
        <div><?=$msg1?></div>
        <div><?=$msg2?></div>
      </div>    
    </div>
    <!--コマンド選択バー-->
    <div class="command_choice">
      <div class="pl_information">
        <form method="POST">
            <legend>コマンド入力</legend>
            <div class="side_line">
              <!--PL隠しデータ-->
              <input type="hidden" name="pl_name" value="<?=$pl_name?>">
              <input type="hidden" name="file_path" value="<?=$file_path1?>">
              <input type="hidden" name="pl_hp" value="<?=$pl_hp?>">
              <input type="hidden" name="Access_power" value="<?=$Access_power?>">
              <input type="hidden" name="attack" value="<?=$attack?>">
              <input type="hidden" name="toughness" value="<?=$toughness?>">
              <input type="hidden" name="speed" value="<?=$speed?>">
              <input type="hidden" name="technic" value="<?=$technic?>">
              <input type="hidden" name="imagination" value="<?=$imagination?>">
              <input type="hidden" name="chase" value="<?=$chase?>">
              <!--NPC隠しデータ-->
              <input type="hidden" name="enemy_name" value="<?=$enemy_name?>">
              <input type="hidden" name="enemy_hp" value="<?=$enemy_hp?>">
              <input type="hidden" name="file_path2" value="<?=$file_path2?>">
              <input type="hidden" name="Access_power2" value="<?=$enemy_Access?>">
              <input type="hidden" name="attack2" value="<?=$attack2?>">
              <input type="hidden" name="toughness2" value="<?=$toughness2?>">
              <input type="hidden" name="speed2" value="<?=$speed2?>">
              <input type="hidden" name="technic2" value="<?=$technic2?>">
              <input type="hidden" name="imagination2" value="<?=$imagination2?>">
              <input type="hidden" name="chase2" value="<?=$chase2?>">
              <input type="hidden" name="heel_item" value="<?=$heel_item?>">
            </div>
            <div>
              <!--選択-->
              <?php if($endflag == 2){ ?>
              <button name="battle_command" value="1">近接攻撃</button>
              <button name="battle_command" value="2">スキル攻撃</button>
              <button name="battle_command" value="3">調査</button>
              <button name="battle_command" value="4">待機</button>
              <p>回復アイテム残数 : <?=$heel_item?></p>
              <?php if($heel_item != 0){ ?>
              <button name="battle_command" value="5">回復する</button>
              <?php } ?>
              <?php } ?>
              <button name="battle_command" value="9">リストへ戻る</button>
            </div>
        </form>
      </div>

    </div>

  </div>
</body>

</html>