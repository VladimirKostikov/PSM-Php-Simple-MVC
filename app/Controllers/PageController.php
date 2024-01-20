<?php

namespace App\Controllers;
use App\Classes\Controller;
use App\Classes\Session;

class PageController extends Controller {

    public function index($data = array()) {
        return $this->view('welcome');
    }   

    public function product($data = array()) {
        return $this->view('product',$data);
    }

    public function profile($data = array()) {
        if(!Session::has('auth')) {
            $this->redirect('/register');
        }

        return $this->view('profile',$data);
    }

    public function login($data = array()) {
        return $this->view('auth/login', $data);
    }

    public function register($data = array()) {
        return $this->view('auth/registration', $data);
    }
}