<?php 
namespace App\DataBase;
use \PDO;

/**
* DataBaseに接続し、値を取得・更新・削除します。
*
* Set.phpからデータベースの接続情報を参照し、
* Conditions.phpで生成したSQL文を実行して値の取得・更新等を行います。
*
* @param  リクエストするsql文
* @param  whereを使用する際のbindParam (デフォルト値 = null)
* @return データベースの情報をJSON形式で返却します。
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
            foreach($param as $val){
                $prepared->bindParam($val["key"],$val["value"]);
            };
        }   
        $isSuccess = $prepared->execute();
        if(explode(" ",$sql)[0] != "SELECT") return $isSuccess;
        $result = $prepared->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
} 
?>