<?php
/**
 * Class View
 * Methods of this class allow you to complete the template
 */

namespace App\Classes;

class View {
    /**
     * The next two variables store the path to the header and footer of the site
     */

    private $path_header;
    private $path_footer;

    /**
     * Constructor
     * Constructor fills the variables with the paths to the header and footer
     */
    public function __construct($header, $footer) {
        $this->path_header = $header;
        $this->path_footer = $footer;
    }

    /**
     * get_header method
     * This method adds a header to the page template
     */
    public function get_header() {
        return include(ROOT.$this->path_header);
    }

    /**
     * get_footer method
     * This method adds a footer to the page template
     */
    public function get_footer() {
        return include(ROOT.$this->path_footer);
    }

}
