<?php

namespace App\Classes;

class Route {
    private $uri;
    private $data = array();

    public function __construct($uri) {
        $this->uri = $uri;
        if(isset($_GET)) {
            $this->uri = strtok($this->uri, '?');
            $this->data = $_GET;
        }
    }

    public function getUri() {
        return $this->uri;
    }

    public function getData() {
        return $this->data;
    }

    protected function findRoute($method, $uri) {
        $routes = include_once(ROOT.'/routes/routes.php');
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

            return call_user_func(array($controller, $route[3]), $this->data);
        }
        else {
            return include(ROOT."/views/errors/404".FILE_TEMPLATE_TYPE);
        }
    }
    
}

