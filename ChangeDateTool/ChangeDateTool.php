<?php
// タイムゾーンのデフォルト値をセット
// ※下記のようなWarningが出るのでそれの対応
// PHP Warning:  strtotime(): It is not safe to rely on the system's timezone settings. You are *required* to use the date.timezone setting or the date_default_timezone_set() function. In case you used any of those methods and you are still getting this warning, you most likely misspelled the timezone identifier.
date_default_timezone_set('Asia/Tokyo');

/*****************************************
 * 曜日を求めるサンプル
 *****************************************/ 
echo '★曜日を求めるサンプル★' . PHP_EOL;
/**
 * 日本の曜日定数配列
 * 
 * @var array
 */
$JPDayOfTheWeek = [0 => '日' ,1 => '月' ,2 => '火' ,3 => '水' ,4 => '木' ,5 => '金' ,6 => '土'];

// 現在日付の「9999年99月99日」形式と「曜日」を取得する
// ※曜日は「0:日、1:月、2:火、3:水、4:木、5:金、6:土」らの情報の数値で取得される
$today        = date("Y年m月d日");
$dayOfTheWeek = date("w");

//「 ◯◯◯◯年◯◯月◯◯日（◯）」形式で現在の日付を画面に出力
echo $today . '(' . $JPDayOfTheWeek[$dayOfTheWeek] . ')' . PHP_EOL;

/*****************************************
 * 文字列の日付から別の日を求めるサンプル
 *****************************************/ 
$targetDate = '2019-04-15';

echo PHP_EOL;
echo '★文字列の日付から別の日を求めるサンプル★' . PHP_EOL;
echo '　対象日:' . date("Y-m-d", strtotime($targetDate)) . PHP_EOL;
echo '　　明日:' . date("Y-m-d", strtotime("tomorrow {$targetDate}")) . PHP_EOL;
echo '　　昨日:' . date("Y-m-d", strtotime("yesterday {$targetDate}")) . PHP_EOL;
echo '　５日後:' . date("Y-m-d", strtotime("+5 day {$targetDate}")) . PHP_EOL;
echo '　５日前:' . date("Y-m-d", strtotime("-5 day {$targetDate}")) . PHP_EOL;
echo '１週間後:' . date("Y-m-d", strtotime("+1 week {$targetDate}")) . PHP_EOL;
echo '１週間前:' . date("Y-m-d", strtotime("-1 week {$targetDate}")) . PHP_EOL;
echo '　　月初:' . date("Y-m-d", strtotime("first day of {$targetDate}")) . PHP_EOL;
echo '　　月末:' . date("Y-m-d", strtotime("last day of {$targetDate}")) . PHP_EOL;
echo '　　来月:' . date("Y-m-d", strtotime("+1 month {$targetDate}")) . PHP_EOL;
echo '　　先月:' . date("Y-m-d", strtotime("-1 month {$targetDate}")) . PHP_EOL;
echo '　１年後:' . date("Y-m-d", strtotime("+1 year {$targetDate}")) . PHP_EOL;
echo '　１年前:' . date("Y-m-d", strtotime("-1 year {$targetDate}")) . PHP_EOL;

/*****************************************
 * 日付型から別の日を求めるサンプル
 *****************************************/ 
$nowDate = new DateTime('now');

echo PHP_EOL;
echo '★日付型から別の日を求めるサンプル★' . PHP_EOL;
echo '　対象日:' . $nowDate->format('Y-m-d') . PHP_EOL;
echo '　　明日:' . $nowDate->modify('tomorrow')->format('Y-m-d') . PHP_EOL;
echo '　　昨日:' . $nowDate->modify('yesterday')->format('Y-m-d') . PHP_EOL;
echo '　５日後:' . $nowDate->modify('+5 day')->format('Y-m-d') . PHP_EOL;
echo '　５日前:' . $nowDate->modify('-5 day')->format('Y-m-d') . PHP_EOL;
echo '１週間後:' . $nowDate->modify('+1 week')->format('Y-m-d') . PHP_EOL;
echo '１週間前:' . $nowDate->modify('-1 week')->format('Y-m-d') . PHP_EOL;
echo '　　月初:' . $nowDate->modify('first day of this month')->format('Y-m-d') . PHP_EOL;
echo '　　月末:' . $nowDate->modify('last day of this month')->format('Y-m-d') . PHP_EOL;
echo '　　来月:' . $nowDate->modify('+1 month')->format('Y-m-d') . PHP_EOL;
echo '　　先月:' . $nowDate->modify('-1 month')->format('Y-m-d') . PHP_EOL;
echo '　１年前:' . $nowDate->modify('+1 year')->format('Y-m-d') . PHP_EOL;
echo '　１年後:' . $nowDate->modify('-1 year')->format('Y-m-d') . PHP_EOL;