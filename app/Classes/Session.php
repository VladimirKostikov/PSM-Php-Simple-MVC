<?php
/**
 * Class Session;
 * The class contains static methods that allow you to work with the sessions
 */

namespace App\Classes;

class Session {
    /**
     * Set method
     * This method allows you to create a session
     * The first argument is the session name, the second argument is the value
     */

    public static function set(string $name, string $value) {
        return $_SESSION[$name] = $value;
    }

    /**
     * Get method
     * This method returns the session value by name
     */

    public static function get(string $name) {
        return $_SESSION[$name];
    }

    /**
     * Has method
     * Checks the existence of a session by name
     */

    public static function has(string $name) {
        return isset($_SESSION[$name]);
    }

    /**
     * Delete method
     * This method deletes the current session by name
     */

    public static function delete(string $name):void {
        unset($_SESSION[$name]); 
    }
}
