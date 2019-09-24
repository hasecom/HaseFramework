<?php
namespace App\Controllers;

use App\Models\ViewModels\Welcome\WelcomeModel;
class welcomeController extends Controller{
    public function Index(){
        $mdl = new WelcomeModel();
        return $this->View("welcome",$mdl);
    }
    public function Post(){
        $mdl = new WelcomeModel();
        return $this->View("welcome",$mdl);
    }
}
?>