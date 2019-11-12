<?php

/**
 * Контроллер рейтинга
 */
class RatingController extends Controller
{
  /**
  * Action для страницы с рейтингом
  *
  * @return boolean true
  */
  public function actionIndex()
  {
    // Если пользователь не авторизован
    if (!$this->isLogged) {
      // Редирект на страницу входа
      header('Location: /login');
    }
    // Получаем рейтинг пользователя
    $rating = Rating::getRating();
    // Получаем коэффициент пользователя
    $coefficient = Rating::getCoefficient();

    require_once(ROOT . '/views/rating/index.php');
    return true;
  }

  /**
   * Action для редактирования рейтинга
   *
   * @return true
   */
  public function actionEdit() {
    // Если пользователь не авторизован
    if (!$this->isLogged) {
      // Редирект на страницу входа
      header('Location: /login');
    }
    // Получаем рейтинг пользователя
    $rating = Rating::getRating();
    $result = false;
    // Если данные отправлены из формы методом POST
    if (isset($_POST['submit'])) {
      $newRatingData = $_POST;
      array_pop($newRatingData);
      $result = Rating::edit($newRatingData);
    }

    require_once(ROOT . '/views/rating/edit.php');
    return true;
  }
}
