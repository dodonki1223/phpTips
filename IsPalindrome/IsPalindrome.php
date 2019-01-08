<?php

/**
 * 回文か
 *   回文かどうか判断し結果を返す。strrev関数を使用し引数の文字列を
 *   逆順にしてそれが引数の文字列と一致した場合は回文と判断し一致し
 *   ない場合は回文でないと判断する
 *
 * @param  string  $str       回文かどうか判断する文字列
 * @return boolean true/false
 */
function IsPalindrome($str)
{
    return $str === strrev($str) ? true : false;
}

// 回文かどうかの確認
echo "<回文かどうかの確認>";
echo PHP_EOL;

echo "aCa："; 
var_dump(IsPalindrome("aCa"));

echo "acc：";
var_dump(IsPalindrome("acc"));

echo "01234567899876543210：";
var_dump(IsPalindrome("01234567899876543210"));

echo "stressedesserts：";
var_dump(IsPalindrome("stressedesserts"));

echo "strEssedesserts：";
var_dump(IsPalindrome("strEssedesserts"));
