<?php
namespace Routes;
use App\Auth\Session;
    ///　<summary>
    /// URLルーティング
    /// 引数：コントローラー名@メソッド名
    /// </summary>
class route{
    public static $requestURI;
    const POST = "POST";
    const GET = "GET";
    public static function get($req,$ctr){
      if($_SERVER['REQUEST_METHOD'] == self::POST)return;
      if($req == self::$requestURI){
        $ctr = explode("@",$ctr);
        $namespace =str_replace("-","\\","App-Controllers-");
        $class = $namespace.$ctr[0];
        $func = $ctr[1];
        return (new $class)->$func();
        die;
      }
    }

    public static function post($req,$ctr){
      if($_SERVER['REQUEST_METHOD'] == self::GET)return;
      if($_REQUEST['token'] != Session::get("CSRF_TOKEN")){
        $_SERVER["REQUEST_METHOD"] = "GET";
        include __DIR__.'/../routes/web.php';
        return;
      }
      if($req == self::$requestURI){
        $ctr = explode("@",$ctr);
        $namespace =str_replace("-","\\","App-Controllers-");
        $class = $namespace.$ctr[0];
        $func = $ctr[1];
        return (new $class)->$func();
        die;
      }
    }
}
