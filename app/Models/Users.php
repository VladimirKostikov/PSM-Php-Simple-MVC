<?php

namespace App\Models;
use App\Classes\DB;


class Users extends DB {
    private $fields = ['login', 'email', 'password'];


    public function __construct() {
        Parent::__construct(substr(strrchr(__CLASS__, "\\"), 1), $this->fields);
    }
}