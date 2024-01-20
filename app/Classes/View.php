<?php
namespace App\Classes;

class View {
    private $path_header;
    private $path_footer;

    public function __construct($header, $footer) {
        $this->path_header = $header;
        $this->path_footer = $footer;
    }

    public function get_header() {
        include(ROOT.$this->path_header);
    }

    public function get_footer() {
        include(ROOT.$this->path_footer);
    }

    public function asset(string $path) {
        echo ROOT."/public/".$path;
        return 1;
    }
}
