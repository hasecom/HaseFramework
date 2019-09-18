<?php
namespace App\DataBase;
use App\DataBase\Conditions;
trait Options {
    protected $table;
    protected $column=[];

    public static function table($table){
        return (new Conditions($table));
    }           

}

?>