<?php

namespace App\Controllers;
use App\Classes\Controller;
use App\Classes\Session;
use App\Classes\DB;

class PageController extends Controller {

    public function index($data = array()) {
        return $this->view('welcome');
    }   

    public function product($data = array()) {
        return $this->view('product',$data);
    }
}