<?php

/**
 * アナグラムか
 *   アナグラムかどうか判断し結果を返す。引数の文字列をすべて小文字に
 *   変換し配列にする。配列の要素数が一致しない時はアナグラムでないと
 *   判断する。アナグラムかどうか判断する文字列とアナグラムか可能性の
 *   ある文字列の文字列が一致した場合はアナグラムと判断し一致しなかっ
 *   た場合はアナグラムと判断しない
 * 
 * @param  string  $str        アナグラムかどうか判断する文字列
 * @param  string  $anagramStr アナグラムか可能性のある文字列
 * @return boolean true/false
 */
function IsAnagram($str, $anagramStr)
{
    // 引数で受け取った文字列をすべて小文字に変換
    // ※この関数の仕様で大文字・小文字は無視するためです
    $strLower        = mb_strtolower($str);
    $anagramStrLower = mb_strtolower($anagramStr);

    // 小文字に変換した引数の文字列を配列に格納
    $strLowerArray        = str_split($strLower);
    $anagramStrLowerArray = str_split($anagramStrLower);

    // 引数の文字列の個数が違う時はアナグラムでないと判断する
    if (count($strLowerArray) <> count($anagramStrLowerArray)) return false;

    // 対象の文字列とアナグラムの文字列一致するか確認する
    foreach($anagramStrLowerArray as $value) {
        // アナグラムの文字列が対象の文字列が存在する時は配列のIndexを返し、
        // 存在しなかった時はアナグラムでないと判断する
        $foundIndex = array_search($value, $strLowerArray);
        if ($foundIndex === false) return false;

        // 見つかった文字列を対象の文字列配列から削除する
        // ※「aabb」, 「abab」などの同じ文字が含まれる場合があるための対応 
        unset($strLowerArray[$foundIndex]);
    }

    return true;

}

// アナグラムかどうかの確認
echo "<アナグラムかどうかの確認>";
echo PHP_EOL;

echo "Abc, bca："; 
var_dump(IsAnagram("Abc", "bca"));

echo "aBc, aac："; 
var_dump(IsAnagram("aBc", "aac"));

echo "123456, 1543a："; 
var_dump(IsAnagram("123456", "1543a"));

echo "StatueOfLiberty, BuiltToStayFree："; 
var_dump(IsAnagram("StatueOfLiberty", "BuiltToStayFree"));
