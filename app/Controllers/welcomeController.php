<?php
namespace App\Controllers;
use App\DataBase\DB;
use App\Models\ViewModels\Welcome\WelcomeModel;
class welcomeController extends Controller{
    public function Index(){
        $mdl = new WelcomeModel();
        $mdl->Title = "a";
     
      $a = DB::table("user")->update('aa','value');
      var_dump($a);

        return $this->View("welcome",$mdl);
    }
}
?>