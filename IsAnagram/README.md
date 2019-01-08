# 文字列がアナグラムかどうか判定する

## アナグラム（文字が並び替えられて別の文字になっているもの）かどうかを判定するメソッド。ここでは大文字小文字の違いは無視する

### 実行結果

```php
$ php IsAnagram.php
<アナグラムかどうかの確認>
Abc, bca：bool(true)
aBc, aac：bool(false)
123456, 1543a：bool(false)
StatueOfLiberty, BuiltToStayFree：bool(true)
```