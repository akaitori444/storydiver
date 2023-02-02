<?php
session_start();
include('functions.php');
check_session_id();


?>
<!-- ①フォームの説明 -->

<!-- ②$_FILEの確認 -->

<!-- ③バリデーション -->



<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>キャラクター入力画面</title>
    <link rel="icon" href="assets/favicon.ico.png">
    <!--jQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!--CSS-->
    <!--リセットCSS-->
    <link rel="stylesheet" type="text/css" href="css/reset.css"/>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
  </head>
  <body>
    <div>
      <div class="top">
        <div class="title">【VisionsTale】データバンク</div>
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
          <p>キャラクターのシンボルを選択してください(シンボルに応じた補正を獲得できます)</p>
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
          <p>キャラクターの所持品を選択してください</p>
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
            </div>
          </div>
          <h1>スキル</h1>
          <p>キャラクターのスキルを選択してください</p>
          <p>同じものは選べません</p>
          <!--1つ目-->
          <select name="skill1">
            <optgroup label="近接">
            <option value="skill_a1">殴打</option>
            <option value="skill_a2">武道</option>
            <option value="skill_a3">反撃</option>
            <option value="skill_a4">暴走</option>
            <optgroup label="遠隔">
            <option value="skill_b1">射撃</option>
            <option value="skill_b2">波動</option>
            <option value="skill_b3">閃光</option>
            <option value="skill_b4">狙撃</option>
            <optgroup label="探索">
            <option value="skill_c1">探知</option>
            <option value="skill_c2">創作</option>
            <option value="skill_c3">解析</option>
            <option value="skill_c4">回避</option>
            <optgroup label="補助">
            <option value="skill_d1">救援</option>
            <option value="skill_d2">調律</option>
            <option value="skill_d3">庇護</option>
            <option value="skill_d4">蘇生</option>
            <optgroup label="変化">
            <option value="skill_e1">炎症</option>
            <option value="skill_e2">休眠</option>
            <option value="skill_e3">破損</option>
            <option value="skill_e4">召喚</option>
            <optgroup label="特殊">
            <option value="skill_f1">共鳴</option>
            <option value="skill_f2">拘束</option>
            <option value="skill_f3">模倣</option>
            <option value="skill_f4">狂乱</option>
            <optgroup label="カスタム">
            <option value="skill_g1">諸刃</option>
            <option value="skill_g2">代償</option>
            <option value="skill_g3">全力</option>
            <option value="skill_g4">吸収</option>
            <option value="skill_g5">俊敏</option>
            <option value="skill_g6">厄災</option>
            <option value="skill_g7">支援</option>
            <option value="skill_g8">商才</option>
            <option value="skill_g9">術士</option>
            <option value="skill_g10">祝福</option>
            <option value="skill_g11">炎症耐性</option>
            <option value="skill_g12">休眠耐性</option>
            <option value="skill_g13">破損耐性</option>
            </select>
          <!--2つ目-->
          <select name="skill2">
            <option value="skill_n">なし</option>
            <optgroup label="近接">
            <option value="skill_a1">殴打</option>
            <option value="skill_a2">武道</option>
            <option value="skill_a3">反撃</option>
            <option value="skill_a4">暴走</option>
            <optgroup label="遠隔">
            <option value="skill_b1">射撃</option>
            <option value="skill_b2">波動</option>
            <option value="skill_b3">閃光</option>
            <option value="skill_b4">狙撃</option>
            <optgroup label="探索">
            <option value="skill_c1">探知</option>
            <option value="skill_c2">創作</option>
            <option value="skill_c3">解析</option>
            <option value="skill_c4">回避</option>
            <optgroup label="補助">
            <option value="skill_d1">救援</option>
            <option value="skill_d2">調律</option>
            <option value="skill_d3">庇護</option>
            <option value="skill_d4">蘇生</option>
            <optgroup label="変化">
            <option value="skill_e1">炎症</option>
            <option value="skill_e2">休眠</option>
            <option value="skill_e3">破損</option>
            <option value="skill_e4">召喚</option>
            <optgroup label="特殊">
            <option value="skill_f1">共鳴</option>
            <option value="skill_f2">拘束</option>
            <option value="skill_f3">模倣</option>
            <option value="skill_f4">狂乱</option>
            <optgroup label="カスタム">
            <option value="skill_g1">諸刃</option>
            <option value="skill_g2">代償</option>
            <option value="skill_g3">全力</option>
            <option value="skill_g4">吸収</option>
            <option value="skill_g5">俊敏</option>
            <option value="skill_g6">厄災</option>
            <option value="skill_g7">支援</option>
            <option value="skill_g8">商才</option>
            <option value="skill_g9">術士</option>
            <option value="skill_g10">祝福</option>
            <option value="skill_g11">炎症耐性</option>
            <option value="skill_g12">休眠耐性</option>
            <option value="skill_g13">破損耐性</option>
            </select>
          <!--3つ目-->
          <select name="skill3">
            <option value="skill_n">なし</option>
            <optgroup label="近接">
            <option value="skill_a1">殴打</option>
            <option value="skill_a2">武道</option>
            <option value="skill_a3">反撃</option>
            <option value="skill_a4">暴走</option>
            <optgroup label="遠隔">
            <option value="skill_b1">射撃</option>
            <option value="skill_b2">波動</option>
            <option value="skill_b3">閃光</option>
            <option value="skill_b4">狙撃</option>
            <optgroup label="探索">
            <option value="skill_c1">探知</option>
            <option value="skill_c2">創作</option>
            <option value="skill_c3">解析</option>
            <option value="skill_c4">回避</option>
            <optgroup label="補助">
            <option value="skill_d1">救援</option>
            <option value="skill_d2">調律</option>
            <option value="skill_d3">庇護</option>
            <option value="skill_d4">蘇生</option>
            <optgroup label="変化">
            <option value="skill_e1">炎症</option>
            <option value="skill_e2">休眠</option>
            <option value="skill_e3">破損</option>
            <option value="skill_e4">召喚</option>
            <optgroup label="特殊">
            <option value="skill_f1">共鳴</option>
            <option value="skill_f2">拘束</option>
            <option value="skill_f3">模倣</option>
            <option value="skill_f4">狂乱</option>
            <optgroup label="カスタム">
            <option value="skill_g1">諸刃</option>
            <option value="skill_g2">代償</option>
            <option value="skill_g3">全力</option>
            <option value="skill_g4">吸収</option>
            <option value="skill_g5">俊敏</option>
            <option value="skill_g6">厄災</option>
            <option value="skill_g7">支援</option>
            <option value="skill_g8">商才</option>
            <option value="skill_g9">術士</option>
            <option value="skill_g10">祝福</option>
            <option value="skill_g11">炎症耐性</option>
            <option value="skill_g12">休眠耐性</option>
            <option value="skill_g13">破損耐性</option>
            </select>
          <!--4つ目-->
          <select name="skill4">
            <option value="skill_n">なし</option>
            <optgroup label="近接">
            <option value="skill_a1">殴打</option>
            <option value="skill_a2">武道</option>
            <option value="skill_a3">反撃</option>
            <option value="skill_a4">暴走</option>
            <optgroup label="遠隔">
            <option value="skill_b1">射撃</option>
            <option value="skill_b2">波動</option>
            <option value="skill_b3">閃光</option>
            <option value="skill_b4">狙撃</option>
            <optgroup label="探索">
            <option value="skill_c1">探知</option>
            <option value="skill_c2">創作</option>
            <option value="skill_c3">解析</option>
            <option value="skill_c4">回避</option>
            <optgroup label="補助">
            <option value="skill_d1">救援</option>
            <option value="skill_d2">調律</option>
            <option value="skill_d3">庇護</option>
            <option value="skill_d4">蘇生</option>
            <optgroup label="変化">
            <option value="skill_e1">炎症</option>
            <option value="skill_e2">休眠</option>
            <option value="skill_e3">破損</option>
            <option value="skill_e4">召喚</option>
            <optgroup label="特殊">
            <option value="skill_f1">共鳴</option>
            <option value="skill_f2">拘束</option>
            <option value="skill_f3">模倣</option>
            <option value="skill_f4">狂乱</option>
            <optgroup label="カスタム">
            <option value="skill_g1">諸刃</option>
            <option value="skill_g2">代償</option>
            <option value="skill_g3">全力</option>
            <option value="skill_g4">吸収</option>
            <option value="skill_g5">俊敏</option>
            <option value="skill_g6">厄災</option>
            <option value="skill_g7">支援</option>
            <option value="skill_g8">商才</option>
            <option value="skill_g9">術士</option>
            <option value="skill_g10">祝福</option>
            <option value="skill_g11">炎症耐性</option>
            <option value="skill_g12">休眠耐性</option>
            <option value="skill_g13">破損耐性</option>
            </select>
            
            <select name="skill5">
            <option value="skill_n">なし</option>
            <optgroup label="近接">
            <option value="skill_a1">殴打</option>
            <option value="skill_a2">武道</option>
            <option value="skill_a3">反撃</option>
            <option value="skill_a4">暴走</option>
            <optgroup label="遠隔">
            <option value="skill_b1">射撃</option>
            <option value="skill_b2">波動</option>
            <option value="skill_b3">閃光</option>
            <option value="skill_b4">狙撃</option>
            <optgroup label="探索">
            <option value="skill_c1">探知</option>
            <option value="skill_c2">創作</option>
            <option value="skill_c3">解析</option>
            <option value="skill_c4">回避</option>
            <optgroup label="補助">
            <option value="skill_d1">救援</option>
            <option value="skill_d2">調律</option>
            <option value="skill_d3">庇護</option>
            <option value="skill_d4">蘇生</option>
            <optgroup label="変化">
            <option value="skill_e1">炎症</option>
            <option value="skill_e2">休眠</option>
            <option value="skill_e3">破損</option>
            <option value="skill_e4">召喚</option>
            <optgroup label="特殊">
            <option value="skill_f1">共鳴</option>
            <option value="skill_f2">拘束</option>
            <option value="skill_f3">模倣</option>
            <option value="skill_f4">狂乱</option>
            <optgroup label="カスタム">
            <option value="skill_g1">諸刃</option>
            <option value="skill_g2">代償</option>
            <option value="skill_g3">全力</option>
            <option value="skill_g4">吸収</option>
            <option value="skill_g5">俊敏</option>
            <option value="skill_g6">厄災</option>
            <option value="skill_g7">支援</option>
            <option value="skill_g8">商才</option>
            <option value="skill_g9">術士</option>
            <option value="skill_g10">祝福</option>
            <option value="skill_g11">炎症耐性</option>
            <option value="skill_g12">休眠耐性</option>
            <option value="skill_g13">破損耐性</option>
            </select>
            
            <select name="skill6">
            <option value="skill_n">なし</option>
            <optgroup label="近接">
            <option value="skill_a1">殴打</option>
            <option value="skill_a2">武道</option>
            <option value="skill_a3">反撃</option>
            <option value="skill_a4">暴走</option>
            <optgroup label="遠隔">
            <option value="skill_b1">射撃</option>
            <option value="skill_b2">波動</option>
            <option value="skill_b3">閃光</option>
            <option value="skill_b4">狙撃</option>
            <optgroup label="探索">
            <option value="skill_c1">探知</option>
            <option value="skill_c2">創作</option>
            <option value="skill_c3">解析</option>
            <option value="skill_c4">回避</option>
            <optgroup label="補助">
            <option value="skill_d1">救援</option>
            <option value="skill_d2">調律</option>
            <option value="skill_d3">庇護</option>
            <option value="skill_d4">蘇生</option>
            <optgroup label="変化">
            <option value="skill_e1">炎症</option>
            <option value="skill_e2">休眠</option>
            <option value="skill_e3">破損</option>
            <option value="skill_e4">召喚</option>
            <optgroup label="特殊">
            <option value="skill_f1">共鳴</option>
            <option value="skill_f2">拘束</option>
            <option value="skill_f3">模倣</option>
            <option value="skill_f4">狂乱</option>
            <optgroup label="カスタム">
            <option value="skill_g1">諸刃</option>
            <option value="skill_g2">代償</option>
            <option value="skill_g3">全力</option>
            <option value="skill_g4">吸収</option>
            <option value="skill_g5">俊敏</option>
            <option value="skill_g6">厄災</option>
            <option value="skill_g7">支援</option>
            <option value="skill_g8">商才</option>
            <option value="skill_g9">術士</option>
            <option value="skill_g10">祝福</option>
            <option value="skill_g11">炎症耐性</option>
            <option value="skill_g12">休眠耐性</option>
            <option value="skill_g13">破損耐性</option>
            </select>
            
            <select name="skill7">
            <option value="skill_n">なし</option>
            <optgroup label="近接">
            <option value="skill_a1">殴打</option>
            <option value="skill_a2">武道</option>
            <option value="skill_a3">反撃</option>
            <option value="skill_a4">暴走</option>
            <optgroup label="遠隔">
            <option value="skill_b1">射撃</option>
            <option value="skill_b2">波動</option>
            <option value="skill_b3">閃光</option>
            <option value="skill_b4">狙撃</option>
            <optgroup label="探索">
            <option value="skill_c1">探知</option>
            <option value="skill_c2">創作</option>
            <option value="skill_c3">解析</option>
            <option value="skill_c4">回避</option>
            <optgroup label="補助">
            <option value="skill_d1">救援</option>
            <option value="skill_d2">調律</option>
            <option value="skill_d3">庇護</option>
            <option value="skill_d4">蘇生</option>
            <optgroup label="変化">
            <option value="skill_e1">炎症</option>
            <option value="skill_e2">休眠</option>
            <option value="skill_e3">破損</option>
            <option value="skill_e4">召喚</option>
            <optgroup label="特殊">
            <option value="skill_f1">共鳴</option>
            <option value="skill_f2">拘束</option>
            <option value="skill_f3">模倣</option>
            <option value="skill_f4">狂乱</option>
            <optgroup label="カスタム">
            <option value="skill_g1">諸刃</option>
            <option value="skill_g2">代償</option>
            <option value="skill_g3">全力</option>
            <option value="skill_g4">吸収</option>
            <option value="skill_g5">俊敏</option>
            <option value="skill_g6">厄災</option>
            <option value="skill_g7">支援</option>
            <option value="skill_g8">商才</option>
            <option value="skill_g9">術士</option>
            <option value="skill_g10">祝福</option>
            <option value="skill_g11">炎症耐性</option>
            <option value="skill_g12">休眠耐性</option>
            <option value="skill_g13">破損耐性</option>
            </select>
            
            <select name="skill8">
            <option value="skill_n">なし</option>
            <optgroup label="近接">
            <option value="skill_a1">殴打</option>
            <option value="skill_a2">武道</option>
            <option value="skill_a3">反撃</option>
            <option value="skill_a4">暴走</option>
            <optgroup label="遠隔">
            <option value="skill_b1">射撃</option>
            <option value="skill_b2">波動</option>
            <option value="skill_b3">閃光</option>
            <option value="skill_b4">狙撃</option>
            <optgroup label="探索">
            <option value="skill_c1">探知</option>
            <option value="skill_c2">創作</option>
            <option value="skill_c3">解析</option>
            <option value="skill_c4">回避</option>
            <optgroup label="補助">
            <option value="skill_d1">救援</option>
            <option value="skill_d2">調律</option>
            <option value="skill_d3">庇護</option>
            <option value="skill_d4">蘇生</option>
            <optgroup label="変化">
            <option value="skill_e1">炎症</option>
            <option value="skill_e2">休眠</option>
            <option value="skill_e3">破損</option>
            <option value="skill_e4">召喚</option>
            <optgroup label="特殊">
            <option value="skill_f1">共鳴</option>
            <option value="skill_f2">拘束</option>
            <option value="skill_f3">模倣</option>
            <option value="skill_f4">狂乱</option>
            <optgroup label="カスタム">
            <option value="skill_g1">諸刃</option>
            <option value="skill_g2">代償</option>
            <option value="skill_g3">全力</option>
            <option value="skill_g4">吸収</option>
            <option value="skill_g5">俊敏</option>
            <option value="skill_g6">厄災</option>
            <option value="skill_g7">支援</option>
            <option value="skill_g8">商才</option>
            <option value="skill_g9">術士</option>
            <option value="skill_g10">祝福</option>
            <option value="skill_g11">炎症耐性</option>
            <option value="skill_g12">休眠耐性</option>
            <option value="skill_g13">破損耐性</option>
            </select>
            
            <select name="skill9">
            <option value="skill_n">なし</option>
            <optgroup label="近接">
            <option value="skill_a1">殴打</option>
            <option value="skill_a2">武道</option>
            <option value="skill_a3">反撃</option>
            <option value="skill_a4">暴走</option>
            <optgroup label="遠隔">
            <option value="skill_b1">射撃</option>
            <option value="skill_b2">波動</option>
            <option value="skill_b3">閃光</option>
            <option value="skill_b4">狙撃</option>
            <optgroup label="探索">
            <option value="skill_c1">探知</option>
            <option value="skill_c2">創作</option>
            <option value="skill_c3">解析</option>
            <option value="skill_c4">回避</option>
            <optgroup label="補助">
            <option value="skill_d1">救援</option>
            <option value="skill_d2">調律</option>
            <option value="skill_d3">庇護</option>
            <option value="skill_d4">蘇生</option>
            <optgroup label="変化">
            <option value="skill_e1">炎症</option>
            <option value="skill_e2">休眠</option>
            <option value="skill_e3">破損</option>
            <option value="skill_e4">召喚</option>
            <optgroup label="特殊">
            <option value="skill_f1">共鳴</option>
            <option value="skill_f2">拘束</option>
            <option value="skill_f3">模倣</option>
            <option value="skill_f4">狂乱</option>
            <optgroup label="カスタム">
            <option value="skill_g1">諸刃</option>
            <option value="skill_g2">代償</option>
            <option value="skill_g3">全力</option>
            <option value="skill_g4">吸収</option>
            <option value="skill_g5">俊敏</option>
            <option value="skill_g6">厄災</option>
            <option value="skill_g7">支援</option>
            <option value="skill_g8">商才</option>
            <option value="skill_g9">術士</option>
            <option value="skill_g10">祝福</option>
            <option value="skill_g11">炎症耐性</option>
            <option value="skill_g12">休眠耐性</option>
            <option value="skill_g13">破損耐性</option>
            </select>
            
            
          <input type="reset" value="リセットする">
          <div>
            <button>作成</button>
          </div>
      </form>
    </dvi>
  </body>
</html>
