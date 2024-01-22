<?php

namespace App\Controllers;
use App\Classes\Controller;
use App\Classes\Session;
use App\Classes\DB;

class ProfileController extends Controller {

    public function profile($data = array()) {
        if(!Session::has('auth')) {
            $this->redirect('/login');
        }

        return $this->view('profile',$data);
    }
}