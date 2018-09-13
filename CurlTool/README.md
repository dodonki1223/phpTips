# cURLを使用したサンプル集です

## cURLを使用してGETリクエストを送信するサンプル

### cURLを使用できるまでの準備（Windows編）
- cURLが使えるようにphp.iniの設定を変更（curlを使用できるかの設定がコメントアウトされているためコメントをはずす）

```
;extension=curl
extension=curl
```

- 証明書の設定がされていないと下記のようなエラーがでる

```
[cURL実行ログ] エラー番号：60、エラー内容：SSL certificate problem: unable to get local issuer certificate ※エラー番号はここを参照「http://php.net/manual/ja/function.curl-errno.php」
``` 

- 証明書を設定する必要があるのでphp.iniの設定を変更（curl.cainfoに証明書ファイルを設定する）

```
[curl]
; A default value for the CURLOPT_CAINFO option. This is required to be an
; absolute path.
;curl.cainfo =
curl.cainfo ="C:\Program Files\Git\etc\pki\ca-trust\extracted\openssl\ca-bundle.trust.crt"
```
- <font color="red">※Git For Windowsに証明書があるのでこれを設定する 注意：このやり方が正しいかはわからない！！</font>


### 実行結果例

```
[cURL実行ログ] URL：https://www.yahoo.co.jp/、HTTPステータス：200、処理時間：0.157

string(19915) "<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
コンテンツの中身
</html>
"

[cURL実行ログ] URL：https://www.yahoo.co.jp/?gorira=1&kirin=2、HTTPステータス：200、処理時間：0.156

string(19915) "<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
コンテンツの中身
</html>
"
```


