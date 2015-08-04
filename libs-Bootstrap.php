<?php
class Bootstrap {
    function __construct() {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, "/");
        $url = explode("/", $url);
        
        if(empty($url[0])){
            require '../controllers/index.php';
            $controller = new Index();
            $controller->index();
            return false;
        }
        
        // CONTROLLER
        // Only allow a controller name with dashes & alphanumeric characters   
        if(preg_match('/[^0-9a-z-]/i',$url[0])){    
            require '../controllers/error.php';
            $controller = new Error("Invalid Character In Controller Name.");
            return false;
        }
        // For the script to read past this line, the controller must be alphanumeric w/ dash
        
        $file = '../controllers/'.$url[0].'.php';
        if(file_exists($file)){
            require $file;
        }else{
            // controller file not found
            // HOW CAN I LOG ERRORS HERE? PUT THEM INTO A DATABASE?
            require '../controllers/error.php';
            $controller = new Error("Controller not found: ".$url[0]);
            return false;
            //throw new Exception("The file '$file' does not exist!");
        }
        $controller = new $url[0];
        $controller->loadModule($url[0]);
        
        // CALLING METHODS -------------------------------
        if(isset($url[2])){
            // CHECK IF METHOD EXISTS
            if(method_exists($controller, $url[1])){
                $controller->{$url[1]}($url[2]);
            }else{
                require '../controllers/error.php';
                $controller = new Error("Method not found: ".$url[1]);
            }
            return false;
        }elseif(isset($url[1])){
            if(method_exists($controller, $url[1])){
                $controller->{$url[1]}();
            }else{
                require '../controllers/error.php';
                $controller = new Error("Method not found: ".$url[1]);
            }
            return false;
        }else{
            $controller->index();
        }
        
        
    }
}
