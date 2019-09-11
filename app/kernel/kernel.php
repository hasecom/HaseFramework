<?php 
namespace App\kernel;
use Routes\sorts;
use Routes\route;


    ///　<summary>
    /// HaseFrameworkの中心クラス
    /// リクエストを順に実行
    /// </summary>
class kernel{
    public function request($domain){
        /// ルーティン設定
        route::$requestURI = (new sorts($domain))->getRequestURI();
        return __DIR__.'/../../routes/web.php';
    }
}
?>