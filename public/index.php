<?php 

/// <summary>
/// はじめに読み込まれる
/// </summary>
require __DIR__.'/../vendor/autoload.php';

/// <summary>
/// ●ユーザ設定
/// ドメインに変更してください。
///　設定以下のURLがルーティンされます。
/// 例 ) example.com/
/// </summary>
const DOMAIN = "http://127.0.0.1/HaseFramework/";
use App\kernel\kernel;


include (new kernel())->request(DOMAIN);

?>