<?php

// Jsonファイルを読み込み、Jsonのデータを連想配列に変換しコンソールに表示
$loadedJsonFile = file_get_contents('sample.json');
$jsonDatas = json_decode($loadedJsonFile, true);
var_dump($jsonDatas);
echo PHP_EOL;

// メソッドを使用して値をコンソールに表示
echo '＜メソッドを使用して取得できた値＞';
echo PHP_EOL;
echo 'キー「sample/aaaaa/bbbbb/ccccc」：' . PHP_EOL;
var_dump(getHierarchyArrayValue($jsonDatas, 'sample/aaaaa/bbbbb/ccccc', '/'));

echo PHP_EOL;
echo 'キー「sample/aaaaa/bbbbb/ddddd」：' . PHP_EOL;
var_dump(getHierarchyArrayValue($jsonDatas, 'sample/aaaaa/bbbbb/ddddd', '/'));

echo PHP_EOL;
echo 'キー「sample/aaaaa/fffff/ggggg」：' . PHP_EOL; 
var_dump(getHierarchyArrayValue($jsonDatas, 'sample/aaaaa/fffff/ggggg', '/'));

echo PHP_EOL;
echo 'キー「sample/aaaaa/」：' . PHP_EOL;
var_dump(getHierarchyArrayValue($jsonDatas, 'sample/aaaaa', '/'));

echo PHP_EOL;
echo 'キー「sample/aaaaa/bbbbb」：' . PHP_EOL;
var_dump(getHierarchyArrayValue($jsonDatas, 'sample/aaaaa/bbbbb', '/'));

echo PHP_EOL;
echo '存在しないキー「sample/aaaaa/gjgjgjg」：' . PHP_EOL;
var_dump(getHierarchyArrayValue($jsonDatas, 'sample/aaaaa/gjgjgjg', '/'));

echo PHP_EOL;
echo '存在しないキー「djdjdjd/gdgdgdg」：' . PHP_EOL;
var_dump(getHierarchyArrayValue($jsonDatas, 'djdjdjd/gdgdgdg', '/'));

/**
 * 階層になっている配列の値をキーから取得する
 *   再帰処理を使用し階層になっている配列の値を階層を表現したキー情報から取得する
 *   存在しないキーを指定した時は空文字を返す
 *   例：$sample = "sample": {"aaaaa": {"bbbbb": {"ccccc": "あいうえお"}}
 *       getHierarchyArrayValue($sample, 'sample/aaaaa/bbbbb/ccccc', '/')で
 *      「あいうえお」が取得できる
 *   
 * @param  array  $arrayData 連想配列の値
 * @param  string $key       値を取得するためのキー情報
 * @return string $cutChar   キーを切り出すための文字列
 */
 function getHierarchyArrayValue(array $arrayData, $key, $cutChar)
 {
 
     // 切り出し文字の位置を取得 ※取得出来ない時はstrposの仕様により「false」を返す
     $cutCharPosition = strpos($key, $cutChar);
 
     if ($cutCharPosition === false) {
 
         // 現在のキーの値が存在する時は現在のキーの値を返し存在しない時は空文字を返す
         return array_key_exists($key, $arrayData) ? $arrayData[$key] : '';
 
     } else {
 
         // 現在のキーまでの値、残りのキーを取得
         $nowKey       = substr($key, 0, $cutCharPosition);
         $remainingKey = substr($key, $cutCharPosition + strlen($cutChar));
 
         // 残りのキーまでの値の取得に失敗した時は空文字を返す
         // ※PHPの仕様でsubstrは失敗した時、Ver5の時はfalseを返し、Ver7の時は空文字を返す
         if ($remainingKey === false || empty($remainingKey) ) return '';
 
        // 現在のキーの値が存在しない時は空文字を返す
        if ( !array_key_exists($nowKey, $arrayData) ) return '';

         // 残りのキーの値を取得する
         return getHierarchyArrayValue($arrayData[$nowKey], $remainingKey, $cutChar);
 
     }
 
 }
