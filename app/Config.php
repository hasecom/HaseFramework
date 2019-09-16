<?php 
namespace App;

class Config{
    public static function get($val){
        return  [
            "DOMAIN"=>getenv("DOMAIN"),
             "DB_USERNAME"=>getenv("DB_USERNAME"),
             "DB_PASSWORD"=>getenv("DB_PASSWORD"),
             "PDO_DSN" =>getenv("PDO_DSN"),
        ][$val];
    }
}
?>