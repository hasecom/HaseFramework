<?php 
namespace App\Controllers;
use App\Auth\Access\AuthorizesRequest;
class Controller {
    use AuthorizesRequest;
    protected function view(){
        return $this->sample();
    }
}

?>