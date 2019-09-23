<?php 
namespace App;

/**
* 環境変数クラス。
*
* .envファイルにある値を取りまとめています。
*
* @param $val リクエストする環境変数のキー
* @return 環境変数
*/

class Config{
    public static function get($val){
        return  [
            "DOMAIN"=>getenv("DOMAIN"),
             "DB_USERNAME"=>getenv("DB_USERNAME"),
             "DB_PASSWORD"=>getenv("DB_PASSWORD"),
             "PDO_DSN" =>getenv("PDO_DSN"),
             "SESSION_SALT_KEY"=>getenv("SESSION_SALT_KEY"),
        ][$val];
    }
}
?>