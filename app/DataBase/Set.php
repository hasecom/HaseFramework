<?php 
namespace App\DataBase;
use App\Config;
use \PDO;
/**
* PDOを利用するためにPDOオブジェクトを作成します。
*
* .ENV,Config.phpにDataBase接続に必要情報を入力してください。
*
*  ・DB_PASSWORD
*  ・DB_USERNAME
*  ・PDO_DSN
*/

trait Set{
    private static $DB_PASSWORD;
    private static $DB_USERNAME;
    private static $PDO_DSN;
    private static $pdo;

    private static function set(){
        self::$DB_PASSWORD = Config::get("DB_PASSWORD");
        self::$DB_USERNAME = Config::get("DB_USERNAME");
        self::$PDO_DSN = Config::get("PDO_DSN");
        self::$pdo = new PDO(self::$PDO_DSN,self::$DB_USERNAME,self::$DB_PASSWORD);
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }
}
?>