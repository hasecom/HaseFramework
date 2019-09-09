<?php 
namespace App\kernel;
include __DIR__.'/../../routes/routes.php';
use App\routes\routes;
    ///　<summary>
    /// HaseFrameworkの中心クラス
    /// リクエストを順に実行
    /// </summary>
class kernel{
    public function request($domain){
        /// ルーティン設定
        echo (new routes($domain))->get();
        //(new route())->get("a");
        /// コントローラ呼び出し
        return include __DIR__.'/../../resource/view/welcome.php';
    }
}
?>