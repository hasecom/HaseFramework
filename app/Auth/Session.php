<?php 
namespace App\Auth;
/**
* Session管理クラス
*
* sessionの管理を行います。
* 
*
* @param  $key sessionのキーを渡します
* @param  
* @return session値、存在有無を返します。
*/
session_start();
class Session{
    private static $session_key;
    private static $session_value;
    public static function get($key){
        if(!self::exist($key))return false;
        self::$session_key = $key;
        return $_SESSION[self::$session_key];
    }
    public static function set($key,$value = null){
        //複数の値(配列)をまとめて入れる場合
        if(gettype($key) == "array" && $value = null){
            foreach($key as $val){
                $_SESSION[$key] = $val;
            }
        }else{
            $_SESSION[$key] = $value;
        }
    }

    public static function exist($key){
        self::$session_key = $key;
        $retVal = false;
        if(isset(session::$session_key)){
            $retVal = true;
        }else{
            $retVal = false;
        }
        return $retVal;
    }

    public static function delete($key){
        if(!self::exist($key))return true;
        self::$session_key = $key;
        unset($_SESSION[self::$session_key]);
        if(!self::exist($key))return true;
        return false;
    }
}

?>