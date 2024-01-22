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
        $users = new Users();
        //$users->create(array("Aversens", "test@mail.ru", "password"));
        //$users->select(array('login'));
        //$users->update(array('login="Dilares"'), array('WHERE id=3'));
        
        return $this->view('auth/registration', $data);
    }

    public function post_login($data = array()) {
        $login = $data["login"];
        $password = md5($data["password"]);

        $users = new Users();
        $exist = $users->select(array('id'),array("WHERE login='{$login}'", " AND password='{$password}'"));

        if($exist) {
            Session::set('auth', $exist["id"]);
            return $this->redirect($GLOBALS['route']->getRoute('profile'));
        }
        else
            return $this->redirect($GLOBALS['route']->getRoute('login').'?error=Incorrect data');
    }

    public function post_reg($data = array()) {
        $login = $data["login"];
        $email = $data["email"];
        $password = md5($data["password"]);

        $users = new Users();
        $exist = $users->select(array('id'),array("WHERE login='{$login}'", " OR email='{$email}'"));

        if(!$exist) {
            $users->create(array($login, $email, $password));
            $res = $users->select(array('id'),array("WHERE login='{$login}'", " AND email='{$email}'"));
            Session::set('auth', $res["id"]);

            return $this->redirect($GLOBALS['route']->getRoute('profile'));
        }
        else {
            return $this->redirect($GLOBALS['route']->getRoute('reg').'?error=User exist');
        }
    }

    public function exit($data = array()) {
        if(Session::has("auth"))
            Session::delete("auth");
        return $this->redirect($GLOBALS['route']->getRoute('login'));
    }
}