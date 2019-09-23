<?php 
namespace App\Auth;
use App\Config;
class Hash{
    const TOKEN_LENGTH = 32;
    public static function SetPass($val){
        return password_hash($val,PASSWORD_DEFAULT);
    }
    public static function ExistPass($val){
        return password_verify($val,self::Hash($val));
    }
    public static function Session($val){
        return crypt($val,Config::get('SESSION_SALT_KEY'));
    }
    public static function CSRF_Token(){
        return bin2hex(openssl_random_pseudo_bytes(self::TOKEN_LENGTH));
    }
}
?>