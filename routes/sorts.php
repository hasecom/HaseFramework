<?php 
/**
 * リクエストされたパスの値を取得
 *
 * クラスの詳細
 * 出来るだけ細かく書いたほうがよいが、詳細な説明は各メソッドに任せる。
 * 全体での共通ルールとか仕様を書く。
 *
 * @author 長谷川 拓磨
 * @category リクエストされたパスを取得して返す
 * @package Route
 */

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

        /**
        * リクエストされたパスを取得
        *
        * ドメインとリクエストURLを比較。
        * その後、ドメインとリクエストの差分を取得して
        * それをリクエストとしている
        *
        * @return string $Request リクエストのパス
        * @see getRequestURI()
        */
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
