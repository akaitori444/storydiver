<?php
require_once "./functions.php";
$pdo = connect_vt_db();
check_session_id();

$id = $_GET['id'];

$sql = 'SELECT * FROM character_status WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

$record = $stmt->fetch(PDO::FETCH_ASSOC);


/*
//受信確認用
echo('<pre>');
var_dump($record);
echo('</pre>');
exit();
*/
?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>キャラクター編集画面</title>
    <link rel="icon" href="assets/favicon.ico.png">
    <!--jQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!--CSS-->
    <!--リセットCSS-->
    <link rel="canonical" href="#">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link rel="stylesheet" type="text/css" href="css/reset.css"/>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
  </head>
  <body>
    <div>
      <div class="top">
        <div class="title">キャラクター編集</div>
      </div>
    </div>
    <a href="vt_list.php">キャラクターリスト</a>
    <dvi class="straight_line">
      <form enctype="multipart/form-data" action="./file_upload.php" method="POST">
          <h1>キャラクター入力</h1>
          <p>あなたのキャラクターデータを入力してください</p>
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
          <input type="hidden" name="battle_command" value="0">
          <h1>スペック</h1>
          <p>キャラクターのスペックを決めてください(能力が高いほど行動の成功率が下がります)</p>
          <div class="side_line">
            <div>こうげき:</div>
            <select name="attack">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3" selected>3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
            </select>
          </div>
          <div class="side_line">
            <div>たふねす:</div>
            <select name="toughness">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3" selected>3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
            </select>
          </div>
          <div class="side_line">
            <div>すばやさ:</div>
            <select name="speed">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3" selected>3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
            </select>
          </div>
          <div class="side_line">
            <div>きようさ:</div>
            <select name="technic">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3" selected>3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
            </select>
          </div>
          <div class="side_line">
            <div>そうぞう:</div>
            <select name="imagination">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3" selected>3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
            </select>
          </div>
          <div class="side_line">
            <div>ついせき:</div>
            <select name="chase">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3" selected>3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
            </select>
          </div>
          <h1>シンボル</h1>
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
          <h1>アイテム</h1>
          <div class="side_line">
            <select name="item">
              <option value="1" selected>おまもり</option>
              <option value="2">近接武器</option>
              <option value="3">遠隔武器</option>
              <option value="4">魔導武器</option>
              <option value="5">情報端末</option>
              <option value="6">身代り</option>
              <option value="7">薬品</option>
              <option value="8">厄払いの面</option>
              <option value="9">活力剤</option>
              <option value="10">従者</option>
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
          </div>
          

          <div>
            <button>作成</button>
          </div>
      </form>
    </dvi>
  </body>
</html>
