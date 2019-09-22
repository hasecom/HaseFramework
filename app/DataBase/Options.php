<?php
namespace App\DataBase;
use App\DataBase\Conditions;
use App\DataBase\Request;
trait Options {

    public static function table($table){
        return (new Conditions($table));
    } 
    public static function sql($sql){
        return (new Request($sql));
    }          

}

?>