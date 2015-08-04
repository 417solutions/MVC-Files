<?php
class Controller {
    function __construct() {
        //print "Main Controller";
        $this->view = new View();
    }
    
    public function loadModule($name){
        $path = '../models/'.$name.'_model.php';
        if(file_exists($path)){
            require $path;
            $modelName = $name.'_model';
            $this->model = new $modelName();
        }
    }
}
