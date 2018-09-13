<?php

// GETリクエストを送信するURL
$url = "https://www.yahoo.co.jp";

// URLパラメーターなしの取得結果をコンソールに表示
var_dump( curlGet($url, array()) );

// URLパラメーターありの取得結果をコンソールに表示
var_dump( curlGet($url, array('gorira' => 1, 'kirin' => 2)) );

/**
 * cURLでGETリクエストを送信
 *   cURLでGETリクエストを送信しコンテンツを受信する
 *   受信できなかった場合はコンソールにエラー番号とエラー内容を表示、受信できた場合も
 *   cURLでGETリクエストを送信したURLとHTTPステータスコードと処理時間をコンソールに表示
 *
 * @param  string $url               GETリクエストを送信するURL
 * @param  string $urlParameter      GETリクエストを送信するURLに付加するURLパラメーター（連想配列）
 * @param  string $additionalOptions cURLに使用するデフォルトのオプションに追加するオプション
 * @return string cURLでGETリクエストを送信して受信したコンテンツ
 */
 function curlGet($url, array $urlParameter, array $additionalOptions = array())
 {

     // GETリクエストを送信するURLを生成
     // URLパラメーターが存在する時は末尾に「?」が無かったら付加し、URLパラメーターを追加した形で生成する
     // ※作成例：http://sampleurl?samplePamram=sampleValue 
     //     URL         ：http://sampleurl
     //     パラメーター：samplePamram=sampleValue
     $getUrlAddedParam = $url;
     if ( !empty($urlParameter) ) $getUrlAddedParam = $url . (strpos($url, '?') === false ? '?' : '') . http_build_query($urlParameter);

    // cURLでGETリクエストを送信する時のデフォルトのオプションを設定
    $defaultOption = array(
        CURLOPT_URL            => $getUrlAddedParam , // GETリクエストを送信するURL
        CURLOPT_HEADER         => false ,             // ヘッダの内容を出力しない
        CURLOPT_RETURNTRANSFER => true ,              // curl_exec()の返り値を文字列で返す
        CURLOPT_TIMEOUT        => 5                   // cURL関数の実行にかけられる時間の最大値（5秒）
    );

    // cURLで使用するオプションを作成（デフォルトのオプション＋追加オプション）
    $option = $defaultOption + $additionalOptions;

    // cURLリソースを作成し、オプションを設定する
    $ch = curl_init();
    curl_setopt_array($ch, $option);

    // cURLセッションを実行しcURLの情報とエラー情報を取得
    $gottaContents = curl_exec($ch);
    $curlInfo      = curl_getinfo($ch);
    $curlErrorNo   = curl_errno($ch);
    $curlError     = curl_error($ch);

    // 結果を画面上に表示
    echo sprintf(
        PHP_EOL . '[cURL実行ログ] URL：%s、HTTPステータス：%s、処理時間：%s' . PHP_EOL . PHP_EOL ,
        $curlInfo['url'] ,
        $curlInfo['http_code'] ,
        $curlInfo['total_time']
    );

    // エラーが有った場合はエラーをコンソールに表示
    if (CURLE_OK !== $curlErrorNo) {

        $errorContents = sprintf(
            PHP_EOL . '[cURL実行ログ] エラー番号：%s、エラー内容：%s ※エラー番号はここを参照「http://php.net/manual/ja/function.curl-errno.php」' . PHP_EOL . PHP_EOL ,
            $curlErrorNo ,
            $curlError
        );
        echo $errorContents;

    }

    // cURLのリソースを解放
    curl_close($ch);

    return $gottaContents;

 }