<?php
// Корневая директория сата:
define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT']);
// Путь к директории проекта от корня сайта:
define('APP_DIR', getenv("APP_DIR") ? getenv("APP_DIR") : "");
// УРЛ сайта:
define('SITE_URL', $_SERVER['HTTP_HOST']);

// Разделитель директорий:
define('DS', DIRECTORY_SEPARATOR);
// Разделитель путей:
define('PS', PATH_SEPARATOR);

// Язык сайта:
define('LOCAL_LANG', 'ru_RU');

// Формат вывода даты и времени (см. справку внизу страницы):
define('DF', '%e %M %Y - %T');

define('INDEX', 'http://'.SITE_URL);

// Пути MVC:
$paths = array(
	'models' => 'model',
	'views' => 'view',
	'controllers' => 'controller',
);

$config = array(
  'img_map' => 'pics/picsmap.txt'
);