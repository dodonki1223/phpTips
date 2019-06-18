<?php
// タイムゾーンのデフォルト値をセット
// ※下記のようなWarningが出るのでそれの対応
// PHP Warning:  strtotime(): It is not safe to rely on the system's timezone settings. You are *required* to use the date.timezone setting or the date_default_timezone_set() function. In case you used any of those methods and you are still getting this warning, you most likely misspelled the timezone identifier.
//date_default_timezone_set('Asia/Tokyo');

$targetDate = '2019-04-15';

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

