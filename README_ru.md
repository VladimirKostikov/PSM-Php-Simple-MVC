<hr>

<p align="center">
    <img src="https://github.com/VladimirKostikov/PSM-Php-Simple-MVC/blob/main/public/img/logo.png?raw=true">
</p>

<hr>

<h2> О проекте </h2>

<p>Этот проект - мой первый самописный PHP MVC скрипт.</p>

<hr>

<h2>Версии окружения при разработке</h2>

- PHP 8.1.2-1ubuntu2.14 (cli) 
- Server version: Apache/2.4.52 (Ubuntu)
- mysql  Ver 8.0.35-0ubuntu0.22.04.1 for Linux on x86_64 ((Ubuntu))
- Composer version 2.6.6 2023-12-08 18:32:26
- Linux Mint 21 Vanessa

<hr>

<h2>Автозагрузчик классов</h2>

<p>Этот проект использует Composer для автозагрузки классов по PSR-4 стандарту</p>
<p>После добавления каких-либо классов нужно прописать следующую команду:</p>

```
composer dump-autoload -o
```

<hr>

<h2>Классы</h2>

<p>Текущая версия содержит в себе следующие классы:</p>

- Controller
- DB
- Route
- Session
- View

<p><b>Controller</b> - абстрактный класс. Его классы-наследники это пользовательские контроллеры </p>
<p><b>DB</b> - класс, который позволяет вам работать с базой данных </p>
<p><b>Route</b> - класс маршрутизации.</p>
<p><b>Session</b> - класс, который позволяет управлять сессиями</p>
<p><b>View</b> - класс, который позволяет дополнять ваши шаблоны</p>

<hr>

<h2>Контроллеры</h2>
<p>Скрипт позволяет вам создавать собственные контроллеры, <b>используя следующий шаблон</b>:</p>

```
namespace App\Controllers;

use App\Classes\Controller;

class PageController extends Controller {

    // Data and methods;

}

```

<hr>

<h2>Модели</h2>
<p>Модели позволяют вам эффективно работать с базой данных. Название таблицы - название модели. <b>Примеры:</b></p>

<p><b>Создание объекта модели</b></p>

```
$users = new Users();
```

<p><b>Добавить строку в таблицу:</b></p>

```
$users->create(array("Vladimir", "email@gmail.com", "password"));
```

<p><b>Получить значение из таблицы:</b></p>

```
$users->select(array('login'));
```

<p><b>Обновить значение в таблице:</b></p>

```
$users->update(array('login="Vladimir"'), array('WHERE id=3'));
```

<hr>

<h2>Конфигурация</h2>
<p>Конфигурационный файл хранит в себе общие настройки сайта:</p>

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

<h2>Папка Public</h2>
<p>.htaccess позволяет сделать запрос в эту папку чтобы получить: стили, ассеты, картинки и т.д.</p>

<hr>

<h2>Роуты</h2>
<p>Эта папка содержит файл со всеми роутами сайта. <b>Пример шаблона роута:</b></p>

```
// TYPE         URL                 Controller              Method          Name
[ 'GET',        '/',               'PageController',       'index',         'welcome'],
```

<hr>

<h2>Виды</h2>
<p>Эта папка содержит в себе все шаблоны сайта</p>

<hr>

<h2>index.php</h2>
<p>.htaccess перенаправляет все запросы в этот файл (кроме запросов к папке public)</p>

<hr>