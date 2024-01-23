<?php

/**
 * This is the main abstract class for all controllers.
 * At the moment, two methods are written here: view, redirect
 */

namespace App\Classes;
require_once ROOT.'/config/config.php';

use App\Classes\View;

abstract class Controller {

    /**
     * The "view" method is a method that is responsible for loading templates from the template folder. 
     * Can accept a $data argument to display information on the page
     */

    protected function view(string $template, $data = array()) {
        $view = new View(PATH_HEADER, PATH_FOOTER);
        return include(ROOT."/views/".$template.FILE_TEMPLATE_TYPE);
    }

    /**
     * The redirect method is a method that allows you to redirect the user. 
     * Function argument - link to page or site
     */

    protected function redirect($uri) {
        header('Location: '.$uri);
        die();
    }
}