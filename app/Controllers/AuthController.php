<?php

namespace App\Controllers;
use App\Classes\Controller;
use App\Classes\Session;
use App\Classes\DB;

class AuthController extends Controller {

    public function login($data = array()) {
        $db = new DB();
        $db->query('SELECT * FROM users');

        return $this->view('auth/login', $data);
    }

    public function register($data = array()) {
        return $this->view('auth/registration', $data);
    }
}