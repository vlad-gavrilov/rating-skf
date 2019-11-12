<?php

/**
 * Модель для различных проверок
 */
class Check
{
  /**
   * Проверка правильности введенных данных при входе в систему
   *
   * @param array $userData Массив с данными, введенными пользователем
   * @return array|false
   */
  public static function checkDataLogin($userData) {
    // Массив с ошибками по умолчанию false
    $errors = false;
    // Если введенный email некорректен, то пишем соответствующую ошибку в массив ошибок
    if (self::incorrectEmail($userData['email'])) { $errors[] = 'Неправильный email'; }
    // Если введенный пароль некорректен, то пишем соответствующую ошибку в массив ошибок
    if (self::incorrectPassword($userData['password'])) { $errors[] = 'Пароль должен быть длинее пяти символов'; }
    return $errors;
  }

  /**
   * Проверка правильности введенных данных при редактировании
   *
   * @param array $userData Массив с данными, введенными пользователем
   * @return array|false
   */
  public static function checkDataEdit($userData) {
    // Массив с ошибками по умолчанию false
    $errors = false;
    // Если введенное фамилия некорректна, то пишем соответствующую ошибку в массив ошибок
    if (self::incorrectName($userData['last_name'])) { $errors[] = 'Фамилия должна содержать от 2 до 50 символов'; }
    // Если введенное имя некорректно, то пишем соответствующую ошибку в массив ошибок
    if (self::incorrectName($userData['first_name'])) { $errors[] = 'Имя должно содержать от 2 до 50 символов'; }
    // Если введенное отчество некорректно, то пишем соответствующую ошибку в массив ошибок
    if (self::incorrectPatronymic($userData['patronymic'])) { $errors[] = 'Отчество должно содержать от 2 до 50 символов, либо отсутствовать'; }
    // Если введенный email некорректен, то пишем соответствующую ошибку в массив ошибок
    if (self::incorrectEmail($userData['email'])) { $errors[] = 'Неправильный email'; }
    return $errors;
  }

  /**
   * Обнаружение наличия ошибок в введенном имени
   *
   * @param string $name Имя пользователя
   * @return true|void
   */
  public static function incorrectName($name) {
    // Длина строки не должна быть менее 2 символа, но не более 50
    // Используется кодировка UTF-8
    if ((mb_strlen($name, 'UTF-8') < 2) || (mb_strlen($name, 'UTF-8') > 50)) {
        return true;
    }
  }

  /**
   * Обнаружение наличия ошибок в введенном отчестве
   *
   * @param string $patronymic Отчество пользователя
   * @return true|void
   */
  public static function incorrectPatronymic($patronymic) {
    // Длина строки не должна быть менее 2 символа, но не более 50, либо вовсе отсутствовать
    // Используется кодировка UTF-8
    if (($patronymic != '') && (mb_strlen($patronymic, 'UTF-8') < 2) || (mb_strlen($patronymic, 'UTF-8') > 50)) {
        return true;
    }
  }

  /**
   * Обнаружение наличия ошибок в введенном email
   *
   * @param string $email email пользователя
   * @return true|void
   */
  public static function incorrectEmail($email) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
        return true;
    }
  }

  /**
   * Обнаружение наличия ошибок в введенном пароле
   *
   * @param string $password Пароль пользователя
   * @return true|void
   */
  public static function incorrectPassword($password) {
    // Длина строки не должна быть менее 6 символов
    // Используется кодировка UTF-8
    if (mb_strlen($password, 'UTF-8') < 6) {
        return true;
    }
  }

  /**
   * Проверка существования в БД пользователя с заданными email и паролем
   *
   * @param array $userData Данные пользователя
   * @return integer|false
   */
  public static function checkUserExists($userData) {
    // Соединение с БД
    $db = Db::getConnection();

    // Выбираем id пользователя с заданными email и паролем
    $sql = 'SELECT teacher_id FROM Auth WHERE email = :email AND password = :password';

    // Хешируем пароль
    $passwordHash = md5($userData['password']);

    $result = $db->prepare($sql);
    $result->bindParam(':email', $userData['email'], PDO::PARAM_STR);
    $result->bindParam(':password', $passwordHash, PDO::PARAM_STR);
    $result->execute();

    $user = $result->fetch();

    // Если пользователь с заданными email и паролем существует, то возвращаем его id
    if ($user) {
      return $user['teacher_id'];
    }

    // Иначе возвращаем false
    return false;
  }

}
