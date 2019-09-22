<?php 
namespace App\Auth;
/**
* Session管理クラス
*
* sessionの管理を行います。
* 
*
* @param  $key sessionのキーを渡します
* @return session値、存在有無を返します。
*/
use App\Auth\Hash;
session_start();
class Session{
    private static $session_key;

    public static function get($key){
        if(!self::exist($key))return false;
        self::$session_key = Hash::Session($key);
        return $_SESSION[self::$session_key];
    }
    public static function set($key,$value = null){
        //複数の値(配列)をまとめて入れる場合
        if(gettype($key) == "array" && $value == null){
            for($i = 0; $i < count($key); $i++){
                self::$session_key = Hash::Session(array_keys($key)[$i]);
                $_SESSION[self::$session_key] = $key[array_keys($key)[$i]];
            }
        }else{
            self::$session_key = Hash::Session($key);
            $_SESSION[self::$session_key] = $value;
        }
    }

    public static function exist($key){
        self::$session_key = Hash::Session($key);
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
        self::$session_key = Hash::Session($key);
        unset($_SESSION[self::$session_key]);
        if(!self::exist($key))return true;
        return false;
    }
}

?>