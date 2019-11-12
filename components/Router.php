<?php

/**
 * Компонент для обработки маршрутов
 */
class Router
{
  /**
   * Массив маршрутов
   *
   * @var array
   */
  private $routes;

  /**
   * Конструктор класса
   */
  public function __construct() {
    $this->routes = include(ROOT . '/config/routes.php');
  }

  /**
   * Возвращает строку запроса
   *
   * @return string
   */
  private function getURI() {
    if (!empty($_SERVER['REQUEST_URI'])) {
      // Обрезаем слешы с начала и конца строки
      return trim($_SERVER['REQUEST_URI'], '/');
    }
  }

  /**
   * Обработка маршрута
   *
   * @return void
   */
  public function run() {
    // Получаем URI запроса
    $URI = $this->getURI();
    // Цикл по всем маршрутам
    foreach ($this->routes as $patternURI => $path) {
      // Если запрос подходит под шаблон
      if (preg_match("~$patternURI~", $URI)) {
        // Из внешнего пути и шаблона формируем внутренний путь
        $internalPath = preg_replace("~$patternURI~", $path, $URI);
        // Разбиваем путь на элементы массива
        $segments = explode('/', $internalPath);
        // Форируем название контроллера
        $NameController = ucfirst(array_shift($segments) . 'Controller');
        // Форируем название экшена
        $actionName = 'action' . ucfirst(array_shift($segments));
        // Форируем путь к файлу соответствующего контроллера
        $controllerPath = ROOT . '/controllers/' . $NameController . '.php';
        // Если такой файл существует, то подключаем его
        if (file_exists($controllerPath)) {
          include_once($controllerPath);
        }
        // Создаем объект подключенного класса-контроллера
        $controller = new $NameController;
        // У данного контроллера вызываем нужный экшн с массивом параметров как аргументами
        $result = call_user_func_array(array($controller, $actionName), $segments);
        // Если экшн вернул true, то выходим из цикла
        if ($result != false) {
          break;
        }
      }
    }
  }
}
