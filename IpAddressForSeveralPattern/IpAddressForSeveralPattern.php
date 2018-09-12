<?php

/**
 * 画面上にIPアドレスを表示するためのテンプレート
 *
 * @var string
 */    
const DISPLAY_IPADRESS_TEMPLETE = '%sのIPアドレス：%s' . PHP_EOL;

echo PHP_EOL;

// Yahoo JapanのIPアドレスを画面上に表示
$ipAddress = '182.22.31.124';
echo sprintf(DISPLAY_IPADRESS_TEMPLETE, 'Yahoo Japan', $ipAddress);

echo PHP_EOL;

/*******************************
 * １オクテットまでのIPアドレス
 *******************************/ 
$ipAddressOctet1 = substr($ipAddress, 0, strpos($ipAddress, '.'));
echo sprintf(DISPLAY_IPADRESS_TEMPLETE, '１オクテットまで', $ipAddressOctet1);

/*******************************
 * ２オクテットまでのIPアドレス
 *******************************/ 
// １オクテット以降のIPアドレスを取得
$ipAddressOctet1Later = substr($ipAddress, strpos($ipAddress, '.') + 1);

// ２オクテットの場所を取得し３オクテット以降のIPアドレスを取得
$octet2Position       = strpos($ipAddressOctet1Later, '.');
$ipAddressOctet2Later = substr($ipAddressOctet1Later, $octet2Position);

// ２オクテットまでのIPアドレスを取得（IPアドレスから３オクテット以降のものを空文字に変換して取得）
// 例：「192.128.10.101」から「.10.101」を空文字にして変換する
$ipAddressOctet2 = str_replace($ipAddressOctet2Later, '', $ipAddress);

echo sprintf(DISPLAY_IPADRESS_TEMPLETE, '２オクテットまで', $ipAddressOctet2);

/*******************************
 * ３オクテットまでのIPアドレス
 *******************************/ 
$ipAddressOctet3 = substr($ipAddress, 0, strrpos($ipAddress, '.'));
echo sprintf(DISPLAY_IPADRESS_TEMPLETE, '３オクテットまで', $ipAddressOctet3);
