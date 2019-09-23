# 自作フレームワークドキュメント

## 名前 : HaseFramework
---
## 事前準備

・ HASEFRAMEWORK直下で、
Composerをインストールしてください。

```
composer install
```

・ 「HASEFRAMEWORK」直下にある
".env.example"を".env"に変更して記述をしてください。

---
## web.php

Web.phpは、URLルーティン設定を行うファイルです。

#### ・コード
`route::get('welcome',welcomeController@Index');`

#### ・解説
`route::get('パス名','コントローラ名@メソッド名')`

* **パス名** 
あなたが指定したいパスを入力します。
先頭に"\\"は必要ありません。

* **コントローラー名** 
コントローラはルーティン設定されたページの処理を行います。
入力値はコントローラクラス名と統一させてください。

* **メソッド名** 
メソッドは、あなたが指定したコントローラ内に存在するメソッド名を入力してください。
"()"は必要ありません。

---
## Controller

Controllerは、ビューにモデルの受け渡しを行います。
#### ・基本形
```
class welcomeController extends Controller{
    public function Index(){
        return $this->View("welcome");
    }
}
```
#### ・解説
```
class コントローラ名 extends Controller{
    public function メソッド名(){
        return $this->View("ファイル名");
    }
}
```
* **コントローラ名** 
自由にクラス名を入力してください。
基本形は、"〇〇Controller"です。

* **メソッド名** 
**web.php**で記述したget,postで受ける
メソッド名を指定してください。

* **戻り値**  
戻り値は必ず下記のフォーマットにしてください。

`return $this->View(ファイル名 [,モデル]);`

ファイル名については、
* resource/view/以下の階層を指定してください。
    拡張子まで入力をしないでください。
    (例 : view/welcome.phpは、welcomeと記述
    (例 : view/welcome/welcome.phpは、welcome/welcomeと記述

* Viewは第一引数にファイル名、第二引数にインスタンス化したモデルを指定できます。
    尚、第三引数以降は指定することはできません。

---
## Model

Modelは、データベースなどから取得したデータを格納して
ビューに返すことが可能です。

#### ・基本形

```
class WelcomeModel extends Model{
    public $Title;
    public $Id;
}
```

#### ・解説

```
class モデル名 extends Model{
    public プロパティ名;
}
```

*  **モデル名**

自由にクラス名を入力してください。
基本形は、"〇〇Model"です。

* **プロパティ**

格納したいデータのプロパティを追加します。
この例では、setter,getterを使用していませんが、自由に格納することができます。
ただし、プロパティのアクセス権には注意してください。

---
## View

Viewは、表示される画面です。
受け取った値を表示します。

*  **ファイル名**

ファイル名は、コントローラの戻り値の
第一引数と同じ名前にしてください。

*  **モデルの受け取り方**
ビュー内では、下記のようにモデルに格納された
値を表示することができます。

#### ・基本形

```
<?php echo $WelcomeModel->Title; ?>
```
#### ・解説

```
<?php echo $モデル名->プロパティ名; ?>
```

*  **モデル名**

表示しているビューのコントローラでインスタンス化した
モデルクラス名を入力してください。

---
## 一連の流れ　（例)

* web.php (route)
```
route::get('welcome',welcomeController@Index');
```

* WelcomeModel.php (model)
```
class WelcomeModel extends Model{
    public $Title;
    public $Id;
}
```

* WelcomeController.php (controller)
```

class WelcomeController extends Controller{
    public function Index(){
        $mdl = new WelcomeModel();
        $mdl->Title = 1;
        return $this->View("welcome",$mdl);
    }
}
```

* welcome.php (view)
```
<div>
    <?php echo $WelcomeModel->Title; ?>
</div>

output: 1
```

---
## ENV
環境変数は、「HASEFRAMEWORK」直下にある
".env.example"を".env"に変更して記述をしてください。

* .env 

```
DOMAIN=example
DB_USERNAME=example
DB_PASSWORD=example
PDO_DSN=example
```

記述方法は上記の通りです。
上記の環境変数は、このフレームワークを使用する上で
必須の値です。指定をしてください。



* Config.php

```
class Config{
    public static function get($val){
        return  [
            "DOMAIN"=>getenv("DOMAIN"),
             "DB_USERNAME"=>getenv("DB_USERNAME"),
             "DB_PASSWORD"=>getenv("DB_PASSWORD"),
             "PDO_DSN" =>getenv("PDO_DSN"),
        ][$val];
    }
}
```

".env"ファイルに記述後は、
appフォルダ直下にあるConfig.phpファイルに
環境変数を定義をしてください。



---
## DataBase

コントローラから簡単に接続が可能です。
PDOパラメータによるバインディングを使用しています。

DBに接続する場合、
下記の一行を宣言してください。

```
use App\DataBase\DB;
```

#### ・select

```
DB::table("テーブル名")->select()->get();
```

テーブル内の全てのカラムを返します。


```
DB::table("テーブル名")->select(”id”)->get();
```

このように記述をすれば、"id"カラムのみ取得することが可能です。

#### ・where

```
DB::table("テーブル名")->select()->where("id","2");
```

このように記述をすれば、"id=2"のデータのみを取得することが可能です。

```
DB::table("テーブル名")->select()->where("id","<","2");
```

"<,<=,>,>="を使用する場合、
whereメソッドの第二引数に指定してください。
"="は、省略しているだけなので第二引数に指定しても
問題はありません。

#### ・update

```
DB::table("テーブル名")->update(["カラム名"=>"値","カラム名"=>"値"])->where("カラム名","値");
```

このように記述をすればアップデートをすることができます。
```
update()
```
の中身は必ず配列にしてください。



#### ・delete

```
DB::table("テーブル名")->delete()->where("カラム名","値");
```

deleteを使用するときはwhere句で条件を記述してください。

#### ・insert

```
 DB::table("テーブル名")->insert(['カラム名①','カラム名②'])->value(['値①','値②']);
 ```

 値を挿入するときはinsertを使用してください。

 ```
insert()
value()
```
の中身は必ず配列にしてください。

#### ・sql

```
DB::sql("SELECT * FROM テーブル名 where カラム名 = :パラメータ名)->bind(['パラメーター名'=>値])
```

上記のsql文にない取得や更新等を行う際は、
sql文を入力して実行が可能です。

```
DB::sql()
```

変数をsql文に加える場合、
必ずバインド変数にしてください。
SQLインジェクションの原因となります。


```
DB::sql()->bind([])
```

---
## Session

Sessionをセット・取得・存在確認するには
下記を宣言してください。

```
use App\Auth\Session;
```

#### ・set

```
Session::set("セッションキー","値")
```

sessionに値を加える場合
setのメソッドを使用します。

セッションにまとめて複数の値を加える場合
下記のキーを使用します。

```
Session::set(["キー"=>"値","キー"=>"値"])
```

#### ・get

```
Session::get("セッションキー")
```

sessionの値を取得するには、
getのメソッドを使用します。

#### ・exist

```
Session::exist("セッションキー")
```

sessionの値の存在の有を確認するには、
existのメソッドを使用します。

存在する場合はtrue
存在しない場合、falseを返します。


---
## Hash

パスワードやセッションキーなどの秘匿する必要のある情報を
ハッシュ化して保持します。

下記を宣言してください。

```
use App\Auth\Hash;
```

#### ・パスワードハッシュ化

```
Hash::SetPass("パスワード")
```

ソルト値はランダムで生成されるため、
ハッシュ値は毎回ランダムです。

これは、phpのパスワードハッシュ関数を使用しています。


#### ・パスワードが一致するか確認

```
Hash::ExistPass("パスワード")
```

平文のパスワードを引数に持たせてください。
(パスワードハッシュ化の引数に持たせている値)

一致すれば、true,
一致しなければ、falseを返します。


#### ・セッションキーのハッシュ化

```
Hash::Session("セッションキー")
```

セッションキーのハッシュ化は、
セッションクラスに組み込まれているため、
セッションを発行するときに使う必要はありません。

セッションのハッシュ化のソルト値は固定です。
.envに記述をしてください。
