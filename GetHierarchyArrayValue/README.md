# 階層になっている配列の値をキーから取得する

## 階層になっている配列の値を階層を表現したキー情報から取得するメソッド

JSONファイルを読み込み、そのJSONファイルから階層を表現したキー情報を渡してJSONファイルの値を取得するサンプルコードになります。

### 読み込むJSONファイル
```json
{
  "sample": {
    "aaaaa": {
      "bbbbb": {
        "ccccc": "あいうえお",
        "ddddd": "かきくけこ",
        "eeeee": "さしすせそ"
      } ,
      "fffff": {
        "ggggg": "たちつてと"
      } 
    }
  }
}
```

### 実行結果
```php
array(1) {
  ["sample"]=>
  array(1) {
    ["aaaaa"]=>
    array(2) {
      ["bbbbb"]=>
      array(3) {
        ["ccccc"]=>
        string(15) "あいうえお"
        ["ddddd"]=>
        string(15) "かきくけこ"
        ["eeeee"]=>
        string(15) "さしすせそ"
      }
      ["fffff"]=>
      array(1) {
        ["ggggg"]=>
        string(15) "たちつてと"
      }
    }
  }
}

＜メソッドを使用して取得できた値＞
キー「sample/aaaaa/bbbbb/ccccc」：
string(15) "あいうえお"

キー「sample/aaaaa/bbbbb/ddddd」：
string(15) "かきくけこ"

キー「sample/aaaaa/fffff/ggggg」：
string(15) "たちつてと"

キー「sample/aaaaa/」：
array(2) {
  ["bbbbb"]=>
  array(3) {
    ["ccccc"]=>
    string(15) "あいうえお"
    ["ddddd"]=>
    string(15) "かきくけこ"
    ["eeeee"]=>
    string(15) "さしすせそ"
  }
  ["fffff"]=>
  array(1) {
    ["ggggg"]=>
    string(15) "たちつてと"
  }
}

キー「sample/aaaaa/bbbbb」：
array(3) {
  ["ccccc"]=>
  string(15) "あいうえお"
  ["ddddd"]=>
  string(15) "かきくけこ"
  ["eeeee"]=>
  string(15) "さしすせそ"
}

存在しないキー「sample/aaaaa/gjgjgjg」：
string(0) ""

存在しないキー「djdjdjd/gdgdgdg」：
string(0) ""
```
