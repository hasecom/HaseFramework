<?php 
namespace App\DataBase;
use \PDO;
/**
 * DataBaseに接続して値を受け取る
*/
trait Connection{

    protected static function connection($sql, $param = null){
    /**
     * DataBaseの情報をプロパティに組み込む
     */
        self::set();
        $connection = self::$pdo;
        $prepared = $connection->prepare("$sql");
        // param付き (where句)
        if($param != null){
         $prepared->bindParam($param["key"], $param["value"]);
        }   
        $prepared->execute();
        $result = $prepared->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
} 
?>