<?php 
namespace App\DataBase;

/**
* SQL文作成クラス。
*
* SQL文の条件句やbindParam値をConnectionクラスに渡します。
*
* @param  $sql_ リクエストするsql文
* @param  $param パラメータ名とバインドする値の配列
* @return connectionで接続してリクエストした結果を返します。
*/

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
        if($this->param != null){
            $this->param[count($this->param)]= $params;
        }else{
            $this->param[0] = $params;
        }
        $this->sql_ .=" WHERE {$column} {$sign} :{$column};";
        return parent::connection($this->sql_,$this->param);
    }

    public function value($value){
        $param = array();
        $vals = "";
        if($this->param != null){
            foreach($this->param as $key=> $val){
                $vals .= ":".$val.(count($this->param) -1 <= $key ? "":", ");
                $param[$key] = ["key"=>":".$val ,"value"=>$value[$key]];
              }
        }else{
            foreach($value as $key => $val){
                $rnd = mt_rand();
                $vals .= ":".$rnd.(count($value) -1 <= $key ? "":", ");
                $param[$key] = ["key"=>":".$rnd ,"value"=>$val];
              }
        }
        $this->param = $param;
        $this->sql_ = $this->sql_ . "VALUE({$vals})";
        return parent::connection($this->sql_,$this->param);
    }
    public function bind($param = null){
        $bindParam = array();
        for($i = 0; $i < count($param); $i++){
            $bindParam[$i] =["key"=>array_keys($param)[$i],"value"=>$param[array_keys($param)[$i]]]; 
        }
        $this->param =$bindParam;
        return parent::connection($this->sql_,$this->param);
    }
}
?>