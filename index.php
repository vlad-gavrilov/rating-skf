<?php
/*
  Front Controller
  Изначально все запросы перенаправляются на этот файл
*/

// Вывод ошибок
ini_set('display_errors', 1);
error_reporting(E_ERROR | E_PARSE);

// Старт куки-сессии
session_start();

// Определение константы ROOT именем корневого каталога
define('ROOT', __DIR__);

// Автозагрузка заданной анонимной функции
spl_autoload_register(function ($class) {
  // Массив директорий в которых хранятся подключаемые классы
  $paths = array(
      '/models/',
      '/controllers/',
      '/components/',
  );
  // Проходим по массиву директорий
  foreach ($paths as $path) {
      // Формируем путь к файлу с классом
      $path = ROOT . $path . $class . '.php';
      // Если файл по такому пути существует, подключаем подключаем его
      if (is_file($path)) {
          include_once $path;
      }
  }
});

// Создаем объект класса Router
$router = new Router();
// Вызываем метод run()
$router->run();
