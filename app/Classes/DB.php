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

    private $table = null;
    private $query = null;
    

    public function __construct($table = null) {
        $this->hostname = DB_HOST;
        $this->login = DB_USER;
        $this->psw = DB_PASSWORD;
        $this->database = DB_NAME;

        $this->table = lcfirst($table);

        $dsn = 'mysql:dbname='.$this->database.';host='.$this->hostname;
        try 
        {
            $this->db = new PDO($dsn, $this->login, $this->psw, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
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
        return $this->result->fetch();
    }


    // Models

    private function isModel() {
        if($this->table == null) {
            echo 'Only Model Allow';
            die();
        }
    }

    public function find(int $id) {
        $this->isModel();

        $this->result = $this->db->query("SELECT * FROM {$this->table} WHERE id={$id}")->fetch();
        return $this->result;
    }

    public function delete(int $id) {
        $this->isModel();

        $this->db->query("DELETE FROM {$this->table} WHERE id={$id}");
        return $this;
    }

    public function close() {
        $this->db = null;
    }



    /*
    public function getTable() {
        return $this->table;
    }
    */
}