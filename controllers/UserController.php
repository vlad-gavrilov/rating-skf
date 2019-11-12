<?php

/**
 * Контроллер пользователя
 */
class UserController extends Controller
{
  /**
   * Action для редактирования данных пользователя
   *
   * @return true
   */
  public function actionEdit() {
    // Если пользователь не авторизован
    if (!$this->isLogged) {
      // Редирект на страницу входа
      header('Location: /login');
    }
    // Получаем данные о пользователе
    $userData = User::getUserInfoById($this->isLogged);
    $result = false;
    $errors = false;
    // Если данные отправлены из формы методом POST
    if (isset($_POST['submit'])) {
      // Если фамилия была передана в форму, то $newUserData['last_name'] присваиваем это значение, иначе присваиваем текущую фамилию пользователя
      // Эта строка эквивалентна: $newUserData['last_name'] = $_POST['last_name'] ? $_POST['last_name'] : $userData['last_name'];
      $newUserData['last_name'] = $_POST['last_name'] ?: $userData['last_name'];
      // Далее аналогично
      $newUserData['first_name'] = $_POST['first_name'] ?: $userData['first_name'];
      $newUserData['patronymic'] = $_POST['patronymic'];
      $newUserData['position'] = $_POST['position'] ?: $userData['position'];
      $newUserData['academic_degree'] = $_POST['academic_degree'] ?: $userData['academic_degree'];
      $newUserData['academic_title'] = $_POST['academic_title'] ?: $userData['academic_title'];
      $newUserData['coefficient'] = $_POST['coefficient'] ?: $userData['coefficient'];
      $newUserData['department'] = $_POST['department'] ?: $userData['department'];
      $newUserData['email'] = $_POST['email'] ?: $userData['email'];

      // Проверяем валидность данных введенных пользователем
      if ($errors == false) {
        $errors = Check::checkDataEdit($newUserData);
      }
      // Если данные прошли валидацию
      if ($errors == false) {
        // Применяем изменения
        $result = User::edit($newUserData);
      }
    }

    require_once(ROOT . '/views/user/edit.php');
    return true;

  }

  /**
   * Action для редактирования пароля пользователя
   *
   * @return true
   */
  public function actionPassword() {
    // Если пользователь не авторизован
    if (!$this->isLogged) {
      // Редирект на страницу входа
      header('Location: /login');
    }
    // Получаем данные о пользователе
    $userData = User::getUserInfoById($this->isLogged);
    $result = false;
    $errors = false;
    // Если данные отправлены из формы методом POST
    if (isset($_POST['submit'])) {
      $password = $_POST['password'];
      $passwordAgain = $_POST['passwordAgain'];
      if ($password != $passwordAgain) {
        $errors[] = 'Введенные пароли не совпадают';
      }
      if ($errors == false) {
        if (Check::incorrectPassword($password)) {
          $errors[] = 'Длина пароля не должна быть менее 6 символов';
        }
        // Лишняя проверка на всякий случай
        if (Check::incorrectPassword($passwordAgain) && !$errors) {
          $errors[] = 'Длина пароля не должна быть менее 6 символов';
        }
      }
      if ($errors == false) {
        // Применяем изменения
        $result = User::editPassword($password);
      }

    }

    require_once(ROOT . '/views/user/password.php');
    return true;
  }

}
