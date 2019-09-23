<?php
namespace App\Controllers;
use App\Auth\Session;
use App\Auth\Hash;
use App\Models\ViewModels\Welcome\WelcomeModel;
class welcomeController extends Controller{
    public function Index(){
        $mdl = new WelcomeModel();
        $mdl->Title = "a";
        return $this->View("welcome",$mdl);
    }
    public function Test(){
        var_dump($_REQUEST);
        echo "a";
        $mdl = new WelcomeModel();
        $mdl->Title = "a";
        return $this->View("welcome",$mdl);
    }
}
?>