<?php
/**
 * index.php
 * The main file where all requests go, except for requests to the public folder
 * 
 */


/**
 * Session initialization
 * Used for authorization
 */
session_start();


/**
 * Connecting class autoloader and config
 */
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/config/config.php';

/**
 * Route class
 * Used to process requests
 */
use App\Classes\Route;

$route = new Route($_SERVER['REQUEST_URI']);
$GLOBALS["route"] = $route;


switch($_SERVER['REQUEST_METHOD']) {
	case("GET"):
		$route->get();
		break;

	case("POST"):
		$route->post();
		break;

	default:
		printf('Err');
}