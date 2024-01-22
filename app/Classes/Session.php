<?php

namespace App\Classes;

class Session {
    public static function set(string $name, string $value) {
        return $_SESSION[$name] = $value;
    }

    public static function has(string $name) {
        return isset($_SESSION[$name]);
    }

    public static function delete(string $name) {
        unset($_SESSION[$name]); 
        return 1;
    }
}
