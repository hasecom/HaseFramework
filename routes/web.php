<?php 
namespace Routes;
use Routes\route;

    ///　<summary>
    /// URLルーティング
    /// 引数：urlのパス,コントローラー名@メソッド名
    /// 例)https://example.com/welcome -> route::get('welcome',welcomeController@Index)
    /// </summary>
    route::get('welcome','welcomeController@Index');
    route::post('welcome','welcomeController@Test');
?>