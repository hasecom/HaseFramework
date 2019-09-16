<?php
namespace App\DataBase;

class Conditions  {
    private $table;
    private $sql;
    function __construct($table)
    {
        $this->table = $table;
    }
    // @todo 各種　例外の処理
    public  function select(){
        $this->sql = "SELECT * FROM {$this->table};";
        return (new request($this->sql));
    }
    public  function where($column = null ,$value =null){
        $params = [
            "key"=>":"."$column",
            "value"=>"$value"
        ];
        $this->sql = "SELECT * FROM {$this->table} WHERE {$column} = :{$column};";
        return (new request($this->sql,$params));
    }
    public  function update(){
        return "a";
    }
    public  function insert(){
        return "a";
    }
    public  function delete(){
        return "a";
    }
}
class request extends DB {
    protected $param;
    protected $sql_;
    function __construct($sql,$param = null){
        $this->param = $param;
        $this->sql_= $sql;
    }
    public function get(){
        return parent::connection($this->sql_,$this->param);
       // return connection();
        ///return array($this->param,$this->table);
    }
    public function value(){
        return "bb";
    }
}
?>