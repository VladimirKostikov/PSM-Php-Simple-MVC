<?php

/**
 * Class Route
 * This is the main routing class
 * .htaccess redirects all URL requests to the index.php file (except for requests to the public folder)
 * This class processes received requests and generates a response to them
 * Currently, this class is designed to accept only two types of requests: GET and POST
 */

namespace App\Classes;

class Route {
    /**
     * $uri variable
     * This variable stores a link to the page
     */

    private $uri;

    /**
     * Constructor
     * The constructor receives a link.
     * If this is a GET request, removes GET variables from the address bar without deleting them from the system
     */

    public function __construct($uri = '/') {
        $this->uri = $uri;
        if(isset($_GET)) {
            $this->uri = strtok($this->uri, '?');
        }
    }

    /**
     * getUri method
     * The function returns the current $uri variable
     */

    public function getUri() {
        return $this->uri;
    }


    /**
     * getRoute method
     * This method allows you to get a link to a page by route name
     * You can use this method in templates
     * If you change the link, the route name will give the template the current link
     */


    public function getRoute(string $name): string {
        $routes = include(ROOT.'/routes/routes.php');
        foreach($routes as $route) {
            if($route[4] == $name) {
                return $route[1];
            }
        }
    }

    /**
     * findRoute method
     * The method searches the routes array for a link that is stored in the $uri variable
     */

    protected function findRoute($method, $uri){
        $routes = include(ROOT.'/routes/routes.php');
        foreach($routes as $route) {
            if($route[0] == $method && $route[1] == $uri) {
                return $route;
                exit(1);
            }
        }
        
    }

    /**
     * GET and POST methods
     * Separate methods of the same name have been created for GET and POST requests so that you can configure them for yourself
     * The method calls the controller that is specified in the list of routes and passes GET and POST data if they exist
     */

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

