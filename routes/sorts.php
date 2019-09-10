<?php 
namespace Routes;
    ///　<summary>
    /// URLルーティング
    /// </summary>
    class sorts{
        private $DOMAIN;
        private $split = "/";
        function __construct($domain)
        {
            $this->DOMAIN = $domain;
        }
        public function getRequestURI(){
            /// $RequestUri : リクエストのあるURI
            /// SplitDomain : 自身のドメイン
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
            $Request = "";
            if($equalStr == "") return $Request = $RequestUri;
            $key = array_search($equalStr,$RequestUri);
            unset($RequestUri[$key]);
            $Request = array_merge($RequestUri);
            return implode("/", $Request);
        }

    }
?>