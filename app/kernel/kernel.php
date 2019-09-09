<?php 
namespace App\kernel;
class kernel{

    public function sample(){
        return include __DIR__.'/../../resource/view/welcome.php';
    }
}
?>