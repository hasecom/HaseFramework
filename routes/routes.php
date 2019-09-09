<?php
namespace App\routes;
use App\Controllers;
    ///　<summary>
    /// URLルーティング
    /// 引数：コントローラー名@メソッド名
    /// </summary>
class routes{
    private $DOMAIN;
    private $split = "/";
    function __construct($domain)
    {
        $this->DOMAIN = $domain;
    }
    public function get(){
        $RequestUri = array_filter(explode($this->split,$_SERVER['REDIRECT_URL']),'strlen');
        $SplitDomain = array_filter(explode($this->split,$this->DOMAIN),'strlen');
        
        $big = count($RequestUri) > count($SplitDomain) ? $RequestUri : $SplitDomain;
        $small = count($RequestUri) > count($SplitDomain) ? $SplitDomain :$RequestUri;
        $equalStr = "";
        foreach($big as $bigVal){
            foreach($small as $smallVal){
                if($bigVal == $smallVal){
                    $equalStr = $bigVal;
                    break;
                }
            }
        }
        echo $equalStr;
    }

    protected function post(){
        
    }
}

?>