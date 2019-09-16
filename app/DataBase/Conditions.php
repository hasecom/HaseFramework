<?php
namespace App\DataBase;

/**
* sqlの作成クラス(以下二つ)
* Conditionsクラス
* Requestクラス
*
* 呼び出しメソッドによって作成されるsql文が異なります。
*/
class Conditions  {
    private $table;
    private $sql;
    function __construct($table)
    {
        $this->table = $table;
    }
    public  function select($need = null){
        if( $need == null){
            $this->sql = "SELECT * FROM {$this->table}";
            return (new Request($this->sql));
        }else{
            $this->sql= "SELECT $need FROM {$this->table}";
            return (new Request($this->sql));
        }
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
class Request extends DB {
    protected $param;
    protected $sql_;
    function __construct($sql,$param = null){
        $this->param = $param;
        $this->sql_= $sql;
    }
    public function get(){
        return parent::connection($this->sql_,$this->param);
    }
    public  function where($column = null,$sign_ = null,$value =null){
        if($value == null){
            $value = $sign_;
            $sign_ = null;    
        }
        $pattern = [
            "<",">","<=",">=","="
        ];
        $sign =$sign_;
        for($i = 0; $i <= count($pattern); $i++){
            if($sign_ == $pattern[$i]){
                $sign =$sign_;
                break;
            }else if($sign_  == null){
                $sign = "=";
                break;
            }
        }
        $params = [
            "key"=>":"."$column",
            "value"=>"$value"
        ];
        $this->param = $params;
        $this->sql_ .=" WHERE {$column} {$sign} :{$column};";

        return parent::connection($this->sql_,$this->param);
    }

    public function value(){
        return "bb";
    }
}
?>