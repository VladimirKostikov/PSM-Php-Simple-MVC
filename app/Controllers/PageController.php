<?php

namespace App\Controllers;

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