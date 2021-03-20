<?php

class Router{

    private $routes;

    public function __construct()
    {
        $routesPath = ROOT . '\config\routes.php';
        $this->routes = include($routesPath);// подключение
        
    }
    //возвращает строку запроса (request string)

    public function getURI(){
        if (empty($_SERVER['REQUEST_URI'] === false)) {
            $uri = trim($_SERVER['REQUEST_URI'], '/');
            return $uri;
        }
    }
    public function run(){
        //Получить строку запроса
        $uri = $this->getURI();
         
        // Проверить наличе запроса в routes.php и action и обработавать запрос
        foreach($this->routes as $key => $value){
            // echo $key . '->' . $value;
            if (preg_match("~$key~",$uri)) {
                // определить контроллер, action, параметры
                $internalRoute= preg_replace("~$key~", $value, $uri);
                $segment= explode('/', $internalRoute);
                $controllerName = array_shift($segment).'Controller';
                $controllerName = ucfirst($controllerName);
                $acionName = 'action' . ucfirst(array_shift($segment));
                $params = $segment;
                echo'<br>'. $controllerName;
                echo'<br>'. $acionName;
                print_r($params);

                // подключить файл класса-контроллер
                $controllerFile = ROOT.'/controllers/'.$controllerName.'.php';
                if (file_exists($controllerFile)) {
                    include_once($controllerFile);
                   
                }
            
                $controllerObject = new $controllerName;
                    $result = call_user_func_array(array($controllerObject, $acionName),$params);
                    if ($result != null) {
                        break;
                        // return;
                    } 

        }
        }
    }
}
