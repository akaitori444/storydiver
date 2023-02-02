<?php
session_start();
require_once "./functions.php";
check_session_id();
$pdo = connect_vt_db();

//受信確認用
//echo('<pre>');
//var_dump($_GET);
//echo('</pre>');
//exit();

$id = $_GET['id'];



$sql = 'DELETE FROM character_status WHERE id=:id';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

header("Location:vt_list.php");
exit();