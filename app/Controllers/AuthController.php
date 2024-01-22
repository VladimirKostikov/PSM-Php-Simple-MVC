<?php

namespace App\Controllers;
use App\Classes\Controller;
use App\Classes\Session;
use App\Classes\DB;

use \App\Models\Users;

class AuthController extends Controller {

    public function login($data = array()) {
        return $this->view('auth/login', $data);
    }

    public function reg($data = array()) {
        return $this->view('auth/registration', $data);
    }

    public function post_login($data = array()) {
        return $this->redirect('/login?error="Incorrect data"');
    }
}