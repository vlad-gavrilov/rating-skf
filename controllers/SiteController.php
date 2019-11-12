<?php

/**
 * Контроллер главной страницы сайта
 */
class SiteController extends Controller
{
  /**
   * Action для главной страницы сайта
   *
   * @return boolean true
   */
  public function actionIndex() {
    // Если пользователь не авторизован
    if (!$this->isLogged) {
      // Редирект на страницу входа
      header('Location: /login');
    }
    // Получаем данные о пользователе
    $userData = $this->userInfo;
    // Исходя из полученных данных получаем должность
    $userTitle = User::getUserPosition($userData['position']);
    // Исходя из полученных данных получаем степень
    $userAcademicDegree = User::getUserAcademicDegree($userData['academic_degree']);
    // Исходя из полученных данных получаем звание
    $userAcademicTitle = User::getUserAcademicTitle($userData['academic_title']);
    // Исходя из полученных данных получаем кафедру
    $userAcademicDepartment = User::getUserDepartment($userData['department']);

    require_once(ROOT . '/views/site/index.php');
    return true;
  }

  /**
   * Action для страницы входа в систему
   *
   * @return boolean true
   */
  public function actionLogin() {
    // Если пользователь авторизован
    if ($this->isLogged) {
      // Редирект на главную
      header('Location: /');
    }

    $result = false;
    $userData['email'] = '';
    $userData['password'] = '';

    // Если данные отправлены из формы методом POST
    if (isset($_POST['submit'])) {
      // Считываем данные из формы
      $userData['email'] = $_POST['email'];
      $userData['password'] = $_POST['password'];

      // Проверяем валидность данных введенных пользователем
      $errors = Check::checkDataLogin($userData);

      // Если данные прошли валидацию
      if ($errors == false) {
        // Проверяем, есть ли пользователь с таким email и паролем. Если да, то возвращаем id этого пользователя
        $id = Check::checkUserExists($userData);
        // Если пользователь не найден
        if ($id == false) {
          $errors[] = 'Пользователь с таким email и паролем не найден';
        } else {
          // Аутентификация пользователя
          User::auth($id);
          // Редирект на личный кабинет
          header('Location: /');
        }
      }
    }
    require_once(ROOT . '/views/site/login.php');
    return true;
  }

  /**
   * Action для страницы выхода из системы
   *
   * @return boolean true
   */
  public function actionLogout() {
    // Если пользователь не авторизован
    if (!$this->isLogged) {
      // Редирект на страницу входа
      header('Location: /login');
    }
    User::logout();
    header('Location: /');
  }

}
