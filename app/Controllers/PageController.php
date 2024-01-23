<?php
/**
 * PageController
 * Custom controller. Created for example
 * This controller is responsible for rendering pages
 */

namespace App\Controllers;

/**
 * We connect classes that will be needed to implement authorization
 * The base Controller class from which the AuthController class inherits
 * Session will store the ID of the authorized user
 */

use App\Classes\Controller;
use App\Classes\Session;
use App\Models\Users;

class PageController extends Controller {

    public function index($data = array()) {
        return $this->view('welcome');
    }   

    public function profile($data = array()) {
        if(Session::has('auth')) {
            $users = new Users();
            $data = $users->find(Session::get('auth'));
            return $this->view('profile', $data);
        }
        else
            return $this->redirect($GLOBALS["route"]->getRoute('login'));
    }
}