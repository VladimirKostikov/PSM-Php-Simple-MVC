<?php

namespace App\Classes;

require_once $_SERVER['DOCUMENT_ROOT'] . '/config/config.php';

use \PDO;
class DB {
    private $hostname;
    private $login;
    private $psw;
    private $database;

    private $db;
    private $result;
    

    public function __construct() {
        $this->hostname = DB_HOST;
        $this->login = DB_USER;
        $this->psw = DB_PASSWORD;
        $this->database = DB_NAME;

        $dsn = 'mysql:dbname='.$this->database.';host='.$this->hostname;
        try 
        {
            $this->db = new PDO($dsn, $this->login, $this->psw, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
            echo '1';
        }
        catch (PDOException $e) 
        {
            echo 'DB Error';
            die();
        }
    }

    public function query(string $sql) {
        $this->result = $this->db->query($sql);
        return $this->result;
    }

    public function fetch() {
        $this->result = $this->fetch();
        return $this->result;
    }

    public function close() {
        $this->db = null;
    }
}