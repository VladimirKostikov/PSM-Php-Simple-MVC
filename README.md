<hr>

<p align="center">
    <img src="https://github.com/VladimirKostikov/PSM-Php-Simple-MVC/blob/main/public/img/logo.png?raw=true">
</p>

<hr>

<h2> About project </h2>

<p>This project is my first self-written MVC system for the PHP language</p>

<hr>

<h2>Development environment versions</h2>

- PHP 8.1.2-1ubuntu2.14 (cli) 
- Server version: Apache/2.4.52 (Ubuntu)
- mysql  Ver 8.0.35-0ubuntu0.22.04.1 for Linux on x86_64 ((Ubuntu))
- Composer version 2.6.6 2023-12-08 18:32:26
- Linux Mint 21 Vanessa

<hr>

<h2>Class autoloader</h2>

<p>This project uses autoloading of classes using Composer according to the PSR-4 standard</p>
<p>After creating new classes, you need to run сlass map generation by this command:</p>

```
composer dump-autoload -o
```

<hr>

<h2>Classes</h2>

<p>The current version contains the following classes</p>

- Controller
- DB
- Route
- Session
- View

<p><b>Controller</b> - abstract class. Abstract class. His heirs are the custom controllers</p>
<p><b>DB</b> - class that allows you to work with a database</p>
<p><b>Route</b> - routing class. Processing URL requests</p>
<p><b>Session</b> - class that allows you to work with sessions</p>
<p><b>View</b> - class that allows you to complement your templates</p>

<hr>

<h2>Controllers</h2>
<p>Script allows you to create your controllers using <b>the following template</b>:</p>

```
namespace App\Controllers;

use App\Classes\Controller;

class PageController extends Controller {

    // Data and methods;

}

```

<hr>

<h2>Models</h2>
<p>Models allow you to quickly write a database query. Model name - table name. <b>Examples:</b></p>

<p><b>Create an instance of the class</b></p>

```
$users = new Users();
```

<p><b>Add row to table:</b></p>

```
$users->create(array("Vladimir", "email@gmail.com", "password"));
```

<p><b>Get data from table:</b></p>

```
$users->select(array('login'));
```

<p><b>Update data in table:</b></p>

```
$users->update(array('login="Vladimir"'), array('WHERE id=3'));
```

<hr>

<h2>Config</h2>
<p>Configuration file stores general site settings:</p>

```
// Site settings
define('APP_NAME', 'Simple MVC Panel');
define('ROOT', $_SERVER['DOCUMENT_ROOT']);

// Template settings
define('PATH_HEADER', '/views/layouts/header.php');
define('PATH_FOOTER', '/views/layouts/footer.php');
define('FILE_TEMPLATE_TYPE', '.php');

// DB Settings
define('DB_HOST', 'localhost');
define('DB_NAME', 'YOUR_VALUE');
define('DB_USER', 'YOUR_VALUE');
define('DB_PASSWORD', 'YOUR_VALUE');

```

<hr>

<h2>Public folder</h2>
<p>.htaccess allows you to send requests to this folder. This folder stores assets, styles, and other scripts</p>

<hr>

<h2>Routes</h2>
<p>This file stores site routes. <b>Example:</b></p>

```
// TYPE         URL                 Controller              Method          Name
[ 'GET',        '/',               'PageController',       'index',         'welcome'],
```

<hr>

<h2>Views</h2>
<p>This folder contains all the site templates</p>

<hr>

<h2>index.php</h2>
<p>.htaccess redirects all requests to this file (except for calls to the public folder)</p>

<hr>