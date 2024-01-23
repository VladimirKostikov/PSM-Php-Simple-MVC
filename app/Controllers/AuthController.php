<?php

/**
 * AuthController
 * Custom controller. Created for example
 * This controller is responsible for user authorization: registration, login
 */

namespace App\Controllers;

/**
 * We connect classes that will be needed to implement authorization
 * The base Controller class from which the AuthController class inherits
 * Session will store the ID of the authorized user
 */

use App\Classes\Controller;
use App\Classes\Session;

/**
 * Connecting the model to the controller
 * Using this model we will access the Users table
 */

use App\Models\Users;

class AuthController extends Controller {

    /**
     * login method
     * Display the authorization page (login)
     */
    public function login($data = array()) {
        return $this->view('auth/login', $data);
    }

    /**
     * reg method
     * Display the authorization page (reg)
     */
    public function reg($data = array()) {
        //$users = new Users();
        //$users->create(array("Aversens", "test@mail.ru", "password"));
        //$users->select(array('login'));
        //$users->update(array('login="Dilares"'), array('WHERE id=3'));
        
        return $this->view('auth/registration', $data);
    }


    /**
     * post_login method
     * This method authorizes the user based on an existing entry in the table
     */
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


    /**
     * post_reg method
     * This method authorizes the user by creating a new entry in the table
     */
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

    /**
     * exit method
     * Clears the user session
     */
    public function exit($data = array()) {
        if(Session::has("auth"))
            Session::delete("auth");
        return $this->redirect($GLOBALS['route']->getRoute('login'));
    }
}