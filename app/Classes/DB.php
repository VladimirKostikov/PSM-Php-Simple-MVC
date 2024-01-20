<?php

namespace App\Classes;

use \PDO;
class DB {
    private $hostname;
    private $login;
    private $psw;
    private $database;

    private $db;
    

    public function __construct($hostname, $login, $psw, $database) {
        $this->hostname = $hostname;
        $this->login = $login;
        $this->psw = $psw;
        $this->database = $database;
    }

    public function connect() {
        $dsn = 'mysql:dbname='.$this->database.';host='.$this->hostname;
        try 
        {
            $this->db = new PDO($dsn, $this->login, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
        }
        catch (PDOException $e) 
        {
            echo 'DB Error';
            die();
        }
    }

    public function close() {
        $this->db = null;
    }
}