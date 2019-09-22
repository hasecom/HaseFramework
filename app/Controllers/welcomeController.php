<?php
namespace App\Controllers;
use App\Auth\Session;
use App\Models\ViewModels\Welcome\WelcomeModel;
class welcomeController extends Controller{
    public function Index(){
        $mdl = new WelcomeModel();
        $mdl->Title = "a";
        return $this->View("welcome",$mdl);
    }
}
?>