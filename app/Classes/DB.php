<?php

/**
 * DB Class
 * Allows you to create queries to the database and obtain results using various methods. 
 * It can be used as an independent object, or it can be used as an object of a class descendant (For example models: App\Models\User.php).
 * Separate methods are prescribed for models that cannot be used in objects of the main class
 */

namespace App\Classes;
require_once $_SERVER['DOCUMENT_ROOT'] . '/config/config.php';


/**
 * This project uses PDO connection to database
 */

use \PDO;

class DB {
    /**
     * Data for database
     */

    private $hostname;
    private $login;
    private $psw;
    private $database;

    /**
     * The $db variable will contain an object of the PDO class
     * Using this variable you can access the following methods: query, fetch, close
     */
    private $db;

    /**
     * The $result variable stores the result of the request
     */

    private $result;

    /**
     * The following variables are used when working with a class descendant object - models
     * The $table variable stores the name of the table - the name of the model.
     * The $fields variable stores table fields
     */
    private $table = null;
    private $fields = array();


    /**
     * Constructor
     * Situational. If you create a DB class object, then the function arguments are ignored
     * If you create an object of a class descendant, the arguments must be passed by the descendant's constructor
     */

    public function __construct($table = null, $fields = array()) {
        $this->hostname = DB_HOST;
        $this->login = DB_USER;
        $this->psw = DB_PASSWORD;
        $this->database = DB_NAME;

        $this->table = lcfirst($table);
        $this->fields = $fields;

        /**
         * Database connection
         */

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

    /**
     * Query method
     * Can be used both by an object of a class and an object of a class descendant
     * The request is accepted as an argument. For example: "SELECT * FROM users"
     */


    public function query(string $sql) {
        $this->result = $this->db->query($sql);
        return $this->result;
    }

    /**
     * Fetch method
     * Can be used both by an object of a class and an object of a class descendant
     * Allows you to take data from the result of the "Query" method
     */

    public function fetch() {
        return $this->result->fetch();
    }

    /**
     * Close method
     * Can be used both by an object of a class and an object of a class descendant
     * Allows you to close the connection to the database
     */

    public function close() {
        $this->db = null;
    }


    /**
     * Models methods
     * The following features apply to models only. 
     * Accessing them from an object of the DB class is prohibited
     */


    /**
     * isModel method
     * This method checks whether the object's class is a descendant
     * According to the rule above, only models should pass tables and fields to the main class constructor
    */

    private function isModel(): void {
        if($this->table == null) {
            echo 'No model or missing arguments';
            die();
        }
    }

    /**
     * Find methods
     * Allows the model to find a table record by unique ID
     */

    public function find(int $id) {
        $this->isModel();

        $this->result = $this->db->query("SELECT * FROM {$this->table} WHERE id={$id}")->fetch();
        return $this->result;
    }

    /**
     * Delete method
     *  Allows the model to delete a table record by unique ID
     */

    public function delete(int $id): void {
        $this->isModel();

        $this->db->query("DELETE FROM {$this->table} WHERE id={$id}");
    }

    /**
     * Update method
     * Allows your model to update a table entry
     * The first argument is fields with new values (For example: field=value)
     * The second argument is additional conditions (For example: WHERE)
     */

    public function update($fields, $condition = array()) {
        $this->isModel();

        if(!empty($fields)) {
            $sql = "UPDATE {$this->table} SET ";

            foreach($fields as $field) {
                if($field != end($fields))
                    $sql .= "{$field},";
                else
                    $sql .= "{$field}";
                $sql .= " ";
            }

            $sql .= " ";
        }

        else {
            echo 'Error. Class object does not contain a field';
            exit();
        }

        if(!empty($condition)) {
            foreach($condition as $con) {
                $sql .= "$con";
                $sql .= " ";
            }
        }

        return $this->query($sql)->fetch();
    }

    /**
     * Select Method
     * Allows you to get values ​​from a table
     * The first argument is fields to get
     * The second argument is additional conditions (For example: WHERE)
     */

    public function select($fields, $condition = array()) {
        $this->isModel();

        if(!empty($fields)) {
            $sql = "SELECT (";

            foreach($fields as $field) {
                if($field != end($fields))
                    $sql .= "{$field},";
                else
                    $sql .= "{$field}";
                $sql .= " ";
            }


            $sql .= ") FROM {$this->table} ";
        }

        else {
            echo 'Error. Fields dont exist in model';
            exit();
        }

        if(!empty($condition)) {
            foreach($condition as $con) {
                $sql .= "$con";
                $sql .= " ";
            }
        }

        return $this->query($sql)->fetch();
        
    }

    /**
     * Create method
     * Method allows you to create a record in a table
     * Argument is fields and values
     */

    public function create(array $values) {
        $this->isModel();

        if(!empty($this->fields)) {
            $sql = "INSERT INTO {$this->table} (";

            foreach($this->fields as $field) {
                if($field != end($this->fields))
                    $sql .= "{$field},";
                else
                    $sql .= "{$field}";
                $sql .= " ";
            }

            $sql .= ") VALUES (";
            
            foreach($values as $val) {
                if($val != end($values))
                    $sql .= "'{$val}',";
                else
                    $sql .= "'{$val}'";
                $sql .= " ";
            }

            $sql .= ");";

            return $this->query($sql);
        }

        else {
            echo 'Error. Fields dont exist in model';
            die();
        }

    }

}