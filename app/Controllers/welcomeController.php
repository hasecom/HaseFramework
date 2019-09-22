<?php
namespace App\Controllers;
use App\DataBase\DB;
use App\Models\ViewModels\Welcome\WelcomeModel;
class welcomeController extends Controller{
    public function Index(){
        $mdl = new WelcomeModel();
        $mdl->Title = "a";
     
     $a = DB::sql("SELECT * FROM user where id = :s AND user_id = :v")->bind([':s'=>1,':v'=>"segateway"]);
      var_dump($a);

        return $this->View("welcome",$mdl);
    }
}
?>