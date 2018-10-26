<?php

echo PHP_EOL;
echo '＜変換元の変換対象の数と変換する文字列群の数が一致しているバージョン＞' . PHP_EOL;
echo 'あ%sい%sう%sえ%sお%sか%sき%sく%sけ%sこ：array("A","B","C","D","E","F","G","H","I")' . PHP_EOL;
var_dump(convertStrings('あ%sい%sう%sえ%sお%sか%sき%sく%sけ%sこ', array("A","B","C","D","E","F","G","H","I")));

echo PHP_EOL;
echo '＜変換元の変換対象の数の方が変換する文字列群の数より少ないバージョン＞' . PHP_EOL;
echo 'あいうえ%sおかき%sくけこ：array("A","B","C","D","E","F","G","H","I")' . PHP_EOL;
var_dump(convertStrings('あいうえ%sおかき%sくけこ', array("A","B","C","D","E","F","G","H","I")));

echo PHP_EOL;
echo '＜変換元の変換対象の数の方が変換する文字列群の数より多いバージョン＞' . PHP_EOL;
echo 'あ%sい%sう%sえ%sおかき%sくけこ：array("A","B")' . PHP_EOL;
var_dump(convertStrings('あ%sい%sう%sえ%sおかき%sくけこ', array("A","B")));

echo PHP_EOL;
echo '＜変換元の変換対象が存在しないバージョン＞' . PHP_EOL;
echo 'あいうえおかきくけこ：array("A","B")' . PHP_EOL;
var_dump(convertStrings('あいうえおかきくけこ', array("A","B")));

echo PHP_EOL;
echo '＜変換する文字列群が存在しないバージョン＞' . PHP_EOL;
echo 'あい%sうえお%sかきくけこ：array()' . PHP_EOL;
var_dump(convertStrings('あい%sうえお%sかきくけこ', array()));

/**
 * 「対象の文字列」中の「変換対象文字列（デフォルト：%s）」を「変換する文字列群（array）」に応じて変換する
 *   ※例：あああ%sああいいい%sいううう%sえええおお 変換元の文字列
 *         array('G','A','M')                       文字列を変換する文字列群
 *         あああGああいいいAいうううMえええおお    変換後の文字列
 *   「文字列を変換する文字列群」の数が多い場合は多い分が無視されます。
 *   ※例：あああ%sああいいい%sいううう%sえええおお 変換元の文字列
 *         array('G','A','M','N','R')               文字列を変換する文字列群
 *         あああ%sああいいい%sいううう%sえええおお 変換後の文字列（N,Rは変換されず無視される）
 *   「文字列を変換する文字列群」が少ない時は文字列を変換する文字列群の数だけ変換されます。
 *   ※例：あああ%sああいいい%sいううう%sえええおお 変換元の文字列
 *         array('G')                               文字列を変換する文字列群
 *         あああGああいいい%sいううう%sえええおお  変換後の文字列（残りの%sはそのまま）
 * 
 * @param  string $str           変換元の文字列
 * @param  array  $convertValues 変換対象となる文字列を変換する文字列群
 * @param  string $convertedChar 変換元の文字列中で変換対象となる文字列（デフォルトは%s）
 * @return string 変換後の文字列
 */
 function convertStrings($str, array $convertValues = array(), $convertedChar = '%s')
 {

    /**************************************
     * 変換対象文字列ごと切り出し
     **************************************/
    $isSepareted = true;
    $separetedWords;

    // 変換元の文字列を変換対象文字列ごと切り分けていく
    while( $isSepareted ) {

        // 変換元の文字列に変換対象の文字列が含まれているかを取得
        $hasConvertedChar = strpos($str, $convertedChar) === false ? false : true;

        if ($hasConvertedChar) {

            // 一番始めに見つかった変換対象の文字列までを含む値をセット「変換対象の文字列前 + 変換対象文字列」
            // ※例：あああ%sああいいい%sいううう%sえええおお → 「あああ%s」
            $separetedWords[] = substr($str, 0, strpos($str, $convertedChar)) . $convertedChar;

            // 切り出す位置を取得し文字列を切り出す
            // ※例：あああ%sああいいい%sいううう%sえええおお → 「ああいいい%sいううう%sえええおお」
            $separetedPosition = strpos($str, $convertedChar) + strlen($convertedChar);
            $str               = substr($str, $separetedPosition);

        } else {

            // そのまま値をセットし切り出し処理の終了フラグをONにする
            $separetedWords[] = $str;
            $isSepareted      = false;

        }

    }

    /**************************************
     * 変換対象文字列を元に文字の変換
     **************************************/
    $convertedStr = '';
    foreach($separetedWords as $key => $value) {

        // 変換文字列を取得する
        // ※変換対象が存在する時は文字列を変換する文字列群から取得し、存在しない時は変換対象文字列とする
        $convertValue = array_key_exists($key, $convertValues) ? $convertValues[$key] : $convertedChar;

        // 変換対象文字列を変換
        // ※変換対象文字列が存在しない場合は変換されない（sprintfの仕様）
        $convertedStr = $convertedStr . sprintf($separetedWords[$key], $convertValue);

    }

    return $convertedStr;
 
 }
