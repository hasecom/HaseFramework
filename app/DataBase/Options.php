<?php
namespace App\DataBase;
use App\DataBase\Conditions;
use App\DataBase\Request;

/**
* アクセスするテーブル名とsqlを返却するトレイト。
*
* SQL文のテーブル名、sql文を返却します。
*
* @param  $table リクエストするテーブル名
* @param  $sql パラメータ名とsql文
* @return connectionで接続してリクエストした結果を返します。
*/

trait Options {
    public static function table($table){
        return (new Conditions($table));
    } 
    public static function sql($sql){
        return (new Request($sql));
    }          

}

?>