<?php
namespace Routes;
    ///　<summary>
    /// URLルーティング
    /// 引数：コントローラー名@メソッド名
    /// </summary>
class route{
    public static $requestURI;
    public static function get($req,$ctr){
      if($req == self::$requestURI){
        $ctr = explode("@",$ctr);
        //TODO: @ がない時にエラー
        $namespace =str_replace("-","\\","App-Controllers-");
        $class = $namespace.$ctr[0];
        $func = $ctr[1];
        echo (new $class)->$func();
        die;
      }
      die("404");
    }

    protected static function post(){
        
    }
}
