<?php
namespace App\Controllers;
use App\Models\Welcome\WelcomeModel;
class welcomeController extends Controller{
    public function Index(){
        $inMdl = new WelcomeModel();
        $inMdl->Title = "aaa";
        return $this->View("welcome",$inMdl);
    }
}
?>