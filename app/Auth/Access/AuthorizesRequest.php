<?php 
namespace App\Auth\Access;
trait AuthorizesRequest{
    ///　<summary>
    /// URLルーティング
    /// 引数：ルーティンパス,返す値
    /// </summary>
     function View($request,$MODEL = null){
         $MODEL_NAME = explode('\\',get_class($MODEL));
         $MODEL_NAME = end($MODEL_NAME);
         ${$MODEL_NAME} = $MODEL;
        return include __DIR__.'/../../../resource/view/'.$request.'.php';
    }
}

?>