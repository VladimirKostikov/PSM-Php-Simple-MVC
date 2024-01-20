<?php

namespace App\Classes;

require_once ROOT.'/config/config.php';
use App\Classes\View;



class Controller {

    protected function view(string $template, $data = array()) {
        $view = new View(PATH_HEADER, PATH_FOOTER);
        include(ROOT."/views/".$template.FILE_TEMPLATE_TYPE);
    }

    protected function redirect($uri) {
        header('Location: '.$uri);
        die();
    }
}