<?php
/**
 * Main configuration file
 * Here are the settings of the site, templates, database
 */

// Site settings
define('APP_NAME', 'Simple MVC Panel');
define('ROOT', $_SERVER['DOCUMENT_ROOT']);

// Template settings
define('PATH_HEADER', '/views/layouts/header.php');
define('PATH_FOOTER', '/views/layouts/footer.php');
define('FILE_TEMPLATE_TYPE', '.php');

// DB Settings
define('DB_HOST', 'localhost');
define('DB_NAME', 'MVC');
define('DB_USER', 'admin');
define('DB_PASSWORD', 'Bar1234@');
