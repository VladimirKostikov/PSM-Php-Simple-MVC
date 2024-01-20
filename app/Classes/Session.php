<?php

namespace App\Classes;

class Session {
    public function set(string $name, string $value) {
        return $_SESSION[$name] = $value;
    }

    public function has(string $name) {
        return isset($_SESSION[$name]);
    }

    public function delete(string $name) {
        unset($_SESSION[$name]); 
    }
}
