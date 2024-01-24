<?php
/**
 * PageController
 * Custom controller. Created for example
 * This controller is responsible for rendering pages
 */

namespace App\Controllers;

/**
 * The base Controller class from which the PageController class inherits
 * Session will check authorization
 */

use App\Classes\Controller;
use App\Classes\Session;
use App\Models\Users;

class PageController extends Controller {

    /**
     * index method
     * Display welcome page
     */
    public function index($data = array()) {
        return $this->view('welcome');
    }   

    /**
     * profile method
     * Display profile page with user data
     */
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