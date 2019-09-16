<?php
namespace App\Controllers;
use App\DataBase\DB;
use App\Models\ViewModels\Welcome\WelcomeModel;
class welcomeController extends Controller{
    public function Index(){
        $mdl = new WelcomeModel();
        $mdl->Title = "a";
        
       $a=  DB::Table("user")->where("user_id","segateway")->get();
       //$a = DB::Table("user")->select()->get();
        var_dump($a);
        
        return $this->View("welcome",$mdl);
    }
}
?>