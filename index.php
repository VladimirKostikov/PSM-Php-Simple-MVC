<?php
session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/config/config.php';

use App\Classes\Route;


$route = new Route($_SERVER['REQUEST_URI']);

switch($_SERVER['REQUEST_METHOD']) {
	case("GET"):
		$route->get();
		break;

	case("POST"):
		$route()->post();
		break;

	default:
		printf('Err');
}