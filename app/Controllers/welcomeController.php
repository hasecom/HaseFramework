<?php
namespace App\Controllers;
use App\DataBase\DB;
use App\Models\ViewModels\Welcome\WelcomeModel;
class welcomeController extends Controller{
    public function Index(){
        $mdl = new WelcomeModel();
        $mdl->Title = "a";
     
      //$a = DB::table("user")->update(["user_id"=>"test","access_token"=>"bb"])->where("id","2");
     // $a = DB::table("user")->select()->where("id","1");
     //$a = DB::table("tweet")->delete()->where("id","53");
     $a = DB::table("tweet")->insert()->value(["tr","ah","g"]);
      var_dump($a);

        return $this->View("welcome",$mdl);
    }
}
?>