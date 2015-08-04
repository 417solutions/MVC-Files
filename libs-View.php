<?php
class View {
    function __construct() {
        //print "VIEW Constructed";
    }
    
    public function render($name, $noWrapper = false){
        if($noWrapper == true){
            require '../views/'.$name.'.php';
        }else{
            require '../views/header.php';
            require '../views/'.$name.'.php';
            require '../views/footer.php';
        }
    }
}
