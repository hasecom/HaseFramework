<?php 
namespace App\Auth\Access;
trait AuthorizesRequest{
    ///　<summary>
    /// URLルーティング
    /// 引数：ルーティンパス,返す値
    /// </summary>
     function View($request,$mdl = null){
        $mdl =json_encode($mdl);
        return include __DIR__.'/../../../resource/view/'.$request.'.php';
    }
}

?>