<?php 
namespace App\Auth\Access;
use App\Auth\Hash;
use App\Auth\Session;
trait AuthorizesRequest{
    ///　<summary>
    /// URLルーティング
    /// 引数：ルーティンパス,返す値
    /// </summary>
     function View($request,$MODEL = null){
         $this->Common($MODEL);
         $MODEL_NAME = explode('\\',get_class($MODEL));
         $MODEL_NAME = end($MODEL_NAME);
         ${$MODEL_NAME} = $MODEL;
         return include __DIR__.'/../../../resource/view/'.$request.'.php';
    }
     function Common($mdl){
        Session::set('CSRF_TOKEN',Hash::CSRF_Token());
        $mdl->CSRF_TOKEN = Session::get('CSRF_TOKEN');
      }
}

?>