<?php


class Route {
    private $path;
    private $callable;
    private $matches = [];

    public function __construct($path, $callable){
        $this->path = trim($path, "/");
        $this->callable = $callable;
    }

    public function match($url){
        $url = str_replace(dirname($_SERVER['SCRIPT_NAME']),"",$url);
        $url = trim($url, '/');
        $path = preg_replace('#:([\w]+)#', '([^/]+)', $this->path);
        $regex = "#^$path$#i";
        if(!preg_match($regex, $url, $matches)){
            return false;
        }
        array_shift($matches);
        $this->matches = $matches;
       
        return true;
    }

    public function call(){

        $callback = call_user_func_array($this->callable, $this->matches);
        $params = explode('/', $callback);
        
        
        if(file_exists(CONTROLLERS.DS.$params[0].'Controller.php')){
            require CONTROLLERS.DS.$params[0].'Controller.php';
                $controller =  $params[0] . "Controller";
                $controller = new $controller();
            if(isset($params[1]) && !empty($params[1])) { 
                return $controller->showone($params[1]);
            } else {
                return $controller->show();
            }
        } else {
            return 'Controller error';
        }
    }
}