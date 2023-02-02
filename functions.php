<?php
/*-------------------------------------------------------------------------------*/
//DB接続用
function connect_vt_db()
{
  $dbn = 'mysql:dbname=gsy_d03_04;charset=utf8mb4;port=3306;host=localhost';
  $user = 'root';
  $pwd = '';
  
  try {
    return new PDO($dbn, $user, $pwd);
  } catch (PDOException $e) {
    echo json_encode(["db error" => "{$e->getMessage()}"]);
    exit();
  }
}
/*-------------------------------------------------------------------------------*/
//ファイルセーブ用
function fileSave($filename, $save_path, $caption, $pl_name, $attack, $toughness, $speed, $technic, $imagination, $chase)
{
    $pdo = connect_vt_db();

    // SQL作成&実行
    $sql = "INSERT INTO character_status (file_name, file_path, caption, pl_name, attack, toughness, speed, technic, imagination, chase) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $pdo->prepare($sql);

    // バインド変数を設定
    $stmt->bindValue(1, $filename);
    $stmt->bindValue(2, $save_path);
    $stmt->bindValue(3, $caption);
    $stmt->bindValue(4, $pl_name);
    $stmt->bindValue(5, $attack);
    $stmt->bindValue(6, $toughness);
    $stmt->bindValue(7, $speed);
    $stmt->bindValue(8, $technic);
    $stmt->bindValue(9, $imagination);
    $stmt->bindValue(10, $chase);

    try {
        $status = $stmt->execute();
    } catch (PDOException $e) {
        echo json_encode(["sql error" => "{$e->getMessage()}"]);
        exit();
    }

}

/*-------------------------------------------------------------------------------*/

// ログイン状態のチェック関数
function check_session_id()
{
  if (!isset($_SESSION["session_id"]) ||$_SESSION["session_id"] !== session_id()) {
    header('Location:vt_login.php');
    exit();
  } else {
    session_regenerate_id(true);
    $_SESSION["session_id"] = session_id();
  }
}