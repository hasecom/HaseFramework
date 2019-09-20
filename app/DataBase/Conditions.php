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
    private $param;
    function __construct($table)
    {
        $this->table = $table;
    }
    public  function select($need = null){
        if( $need == null){
            $this->sql = "SELECT * FROM {$this->table}";
        }else{
            $this->sql= "SELECT $need FROM {$this->table}";
        }
        return (new Request($this->sql));

    }
    // updateは変更を許すカラム名と変更したい値を入力します。
    public function update($req,$subVal = null){
    $sql = "UPDATE {$this->table} SET ";
    if(gettype($req) != "array" && $subVal != null){
        $sql.= "{$req} = :{$req}";
        $this->param = [
            [
            "key"=>":"."$req",
            "value"=>"$subVal"
            ]
        ];
    }else{
        $length = count($req);
        $param = [];
        for($i = 0; $i < $length; $i++){
            $sql.= array_keys($req)[$i] ."= :".array_keys($req)[$i];
            if(1 < $length && $i + 1 < $length){
                $sql.=', ';
            }
            $param .= [
                [
                "key"=>":".array_keys($req)[$i],
                "value"=>$req[array_keys($req)[1]]
                ]
            ];
        }
        $this->param = $param;
    }
   $this->sql = $sql;
   return (new Request($this->sql,$this->param));
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
        var_dump($this->param);
        $this->param = $params;
        $this->sql_ .=" WHERE {$column} {$sign} :{$column};";

       // return parent::connection($this->sql_,$this->param);
    }

    public function value(){
        return "bb";
    }
}
?>