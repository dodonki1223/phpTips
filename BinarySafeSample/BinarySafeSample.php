<?php

// ロケールを日本語にする
// ※strcollはロケールが C または POSIX の場合、strcmpと等価なのでロケールの設定をする
setlocale (LC_COLLATE, 'ja_JP.UTF-8');

// 現在のロケールを表示する
echo setlocale(LC_ALL, 0) . PHP_EOL . PHP_EOL;

// 比較対象の文字列をセットする
$str1 = 'こんにちわ\x00ゴリラくん';
$str2 = 'こんにちわゴリラくん';

// strcoll ※バイナリセーフでない関数を使用
// 結果として、「2147483647」を返す（str1の方が大きいと判断している）
echo 'strcoll：' . strcoll($str1, $str2);

echo PHP_EOL;

// strcmp ※バイナリセーフな関数を使用
// 結果として、「-1」を返す（str2の方が大きいと判断している）
echo 'strcmp：' . strcmp($str1, $str2);
