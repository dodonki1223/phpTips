# 「対象の文字列」中の「変換対象文字列（デフォルト：%s）」を「変換する文字列群（array）」に応じて変換する

## 変換対象文字列をarrayで渡した文字列群を元に変換して返すメソッド。sprintfを配列で出来るようにしたメソッドになります

### 実行結果
```shell
＜変換元の変換対象の数と変換する文字列群の数が一致しているバージョン＞
あ%sい%sう%sえ%sお%sか%sき%sく%sけ%sこ：array("A","B","C","D","E","F","G","H","I")
string(39) "あAいBうCえDおEかFきGくHけIこ"

＜変換元の変換対象の数の方が変換する文字列群の数より少ないバージョン＞
あいうえ%sおかき%sくけこ：array("A","B","C","D","E","F","G","H","I")
string(32) "あいうえAおかきBくけこ"

＜変換元の変換対象の数の方が変換する文字列群の数より多いバージョン＞
あ%sい%sう%sえ%sおかき%sくけこ：array("A","B")
string(38) "あAいBう%sえ%sおかき%sくけこ"

＜変換元の変換対象が存在しないバージョン＞
あいうえおかきくけこ：array("A","B")
string(30) "あいうえおかきくけこ"

＜変換する文字列群が存在しないバージョン＞
あい%sうえお%sかきくけこ：array()
string(34) "あい%sうえお%sかきくけこ"
```
