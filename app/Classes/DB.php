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
    private $fields = array();

    public function __construct($table = null, $fields = null) {
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

    public function close() {
        $this->db = null;
    }


    // Models

    private function isModel(): void {
        if($this->table == null) {
            echo 'Only Model Allow';
            die();
        }
    }

    protected function find(int $id) {
        $this->isModel();

        $this->result = $this->db->query("SELECT * FROM {$this->table} WHERE id={$id}")->fetch();
        return $this->result;
    }

    protected function delete(int $id) {
        $this->isModel();

        $this->db->query("DELETE FROM {$this->table} WHERE id={$id}");
        return $this;
    }

    protected function update($fields, $condition = array()) {
        $this->isModel();

        if(!empty($fields)) {
            $sql = "UPDATE {$this->table} SET (";

            foreach($fields as $field) {
                if($field != end($fields))
                    $sql .= "{$field},";
                else
                    $sql .= "{$field}";
            }

            $sql .= ")";
        }

        else {
            echo 'Fields required';
            exit();
        }

        if(!empty($condition)) {
            foreach($condition as $con) {
                $sql .= "$con";
            }
        }

        return $this->query($sql)->fetch();
    }

    protected function select($fields, $condition = array()) {
        $this->isModel();

        if(!empty($fields)) {
            $sql = "SELECT (";

            foreach($fields as $field) {
                if($field != end($fields))
                    $sql .= "{$field},";
                else
                    $sql .= "{$field}";
            }

            $sql .= ") FROM {$this->table}";
        }

        else {
            echo 'Fields required';
            exit();
        }

        if(!empty($condition)) {
            foreach($condition as $con) {
                $sql .= "$con";
            }
        }

        return $this->query($sql)->fetch();
        
    }

    protected function create(array $values) {
        $this->isModel();

        if(!empty($this->fields)) {
            $sql = "INSERT INTO {$this->table} (";

            foreach($this->fields as $field) {
                if($field != end($this->fields))
                    $sql .= "{$field},";
                else
                    $sql .= "{$field}";
            }

            $sql .= ") VALUES (";
            
            foreach($values as $val) {
                if($val != end($this->values))
                    $sql .= "{$val},";
                else
                    $sql .= "{$val}";
            }

            $sql .= ");";

            return $this->query($sql);
        }

        else {
            echo 'Fields dont exist in model';
            die();
        }

    }

}