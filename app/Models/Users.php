<?php

/**
 * Users model. Created for example
 * Model accesses the Users table
 * Using this model you can access the database
 */

namespace App\Models;
use App\Classes\DB;


class Users extends DB {
    private $fields = ['login', 'email', 'password'];


    public function __construct() {
        Parent::__construct(substr(strrchr(__CLASS__, "\\"), 1), $this->fields);
    }
}