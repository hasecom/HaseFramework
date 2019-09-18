<?php 

/**
* composerのautoloaderをロード
*
*以降の処理は名前空間の指定が可能です。
*/
require __DIR__.'/../vendor/autoload.php';


/**
* composerのphpdotenvをロード 
*
* 環境変数ファイル.envをHASEFRAMEWORK直下に置いてあります。
* 新規で使用する際は直下の.env.exampleを使用してください。
*/
$appDir = __DIR__."/../";
$dotenv = Dotenv\Dotenv::create($appDir);
$dotenv->load();

/**
* ユーザ設定
*
* ドメインに変更してください。
* 設定以下のURLがルーティンされます。
* 例 ) example.com/
*/
use App\Config;
const DOMAIN = "http://127.0.0.1/HaseFramework/";
use App\kernel\kernel;
include './common.php';
include (new kernel())->request(Config::Get('DOMAIN'));
?>
