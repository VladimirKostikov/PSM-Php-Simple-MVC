<?php

namespace App\Classes;

class Route {
    private $uri;

    public function __construct($uri = '/') {
        $this->uri = $uri;
        if(isset($_GET)) {
            $this->uri = strtok($this->uri, '?');
        }
    }

    public function getUri() {
        return $this->uri;
    }

    public function getData() {
        return $this->data;
    }

    public function getRoute(string $name): string {
        $routes = include(ROOT.'/routes/routes.php');
        foreach($routes as $route) {
            if($route[4] == $name) {
                return $route[1];
            }
        }
    }

    protected function findRoute($method, $uri){
        $routes = include(ROOT.'/routes/routes.php');
        foreach($routes as $route) {
            if($route[0] == $method && $route[1] == $uri) {
                return $route;
                exit(1);
            }
        }
        
    }

    public function get() {
        $route = $this->findRoute('GET', $this->uri);

        if($route != NULL) {
            $class = "App\Controllers\\".$route[2];
            $controller = new $class();

            return call_user_func(array($controller, $route[3]), $_GET);
        }
        else {
            return include(ROOT."/views/errors/404".FILE_TEMPLATE_TYPE);
        }
    }

    public function post() {
        $route = $this->findRoute('POST', $this->uri);

        if($route != NULL) {
            $class = "App\Controllers\\".$route[2];
            $controller = new $class();

            return call_user_func(array($controller, $route[3]), $_POST);
        }
        else {
            return include(ROOT."/views/errors/404".FILE_TEMPLATE_TYPE);
        }
    }
    
}

