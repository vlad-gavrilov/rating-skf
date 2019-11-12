<?php

/**
 * Компонент для наследования остальными контроллерами
 * Реализует свойства общие для всех контроллеров
 */
class Controller
{
  /**
   * Идентификатор пользователя
   *
   * @var integer|null
   */
  protected $isLogged;

  /**
   * Информация о пользователе
   *
   * @var array
   */
  protected $userInfo;

  /**
   * Конструктор
   */
  public function __construct() {
    // Получаем идентификатор пользователя
    $this->isLogged = User::isLogged();
    // Если пользователь авторизован
    if ($this->isLogged) {
      //Получаем информацию о пользователе
      $this->userInfo = User::getUserInfoById($this->isLogged);
    }
  }

}
