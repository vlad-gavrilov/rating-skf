<?php

/**
 * Модель для работы с пользователем
 */
class User
{
  /**
   * Аутентификация пользователя
   *
   * @param integer $id Идентификатор пользователя
   * @return void
   */
  public static function auth($id) {
    $_SESSION['user'] = $id;
  }

  /**
   * Выход пользователя из системы
   *
   * @return void
   */
  public static function logout() {
    unset($_SESSION["user"]);
  }

  /**
   * Проверка того, что пользователь аутентифицирован в системе
   *
   * @return integer|false
   */
  public static function isLogged() {
    // Если $_SESSION['user'] определено идентификатором пользователя, то возвращаем это значение
    // Иначе возвращаем false
    // Эта строка эквивалентна следующему:
    // return isset($_SESSION['user']) ? $_SESSION['user'] : false;
    return $_SESSION['user'] ?? false;
  }

  /**
   * Получить информацию о пользователе по его идентификатору
   *
   * @param integer $id Идентификатор пользователя
   * @return mixed|false
   */
  public static function getUserInfoById($id) {
    // Соединение с БД
    $db = Db::getConnection();
    // Выбрать всех пользователей с заданным id
    $sql = 'SELECT * FROM Teachers INNER JOIN Auth ON id = teacher_id AND id = :id';

    $result = $db->prepare($sql);
    $result->bindParam(':id', $id, PDO::PARAM_INT);
    $result->execute();

    return $result->fetch();
  }

  /**
   * Редактировать данные пользователя
   *
   * @param array $newUserData Новые данные пользователя
   * @return boolean
   */
  public static function edit($newUserData) {
    // Соединение с БД
    $db = Db::getConnection();
    // Получаем id пользователя
    $id = self::isLogged();
    $sql = 'UPDATE Teachers
            SET last_name = :last_name,
                first_name = :first_name,
                patronymic = :patronymic,
                position = :position,
                academic_degree = :academic_degree,
                academic_title = :academic_title,
                coefficient = :coefficient,
                department = :department
            WHERE id = :id;

            UPDATE Auth
            SET email = :email
            WHERE teacher_id = :id
            ';
    $result = $db->prepare($sql);
    $result->bindParam(':last_name', $newUserData['last_name'], PDO::PARAM_STR);
    $result->bindParam(':first_name', $newUserData['first_name'], PDO::PARAM_STR);
    $result->bindParam(':patronymic', $newUserData['patronymic'], PDO::PARAM_STR);
    $result->bindParam(':position', $newUserData['position'], PDO::PARAM_INT);
    $result->bindParam(':academic_degree', $newUserData['academic_degree'], PDO::PARAM_INT);
    $result->bindParam(':academic_title', $newUserData['academic_title'], PDO::PARAM_INT);
    $result->bindParam(':coefficient', $newUserData['coefficient'], PDO::PARAM_INT);
    $result->bindParam(':department', $newUserData['department'], PDO::PARAM_INT);
    $result->bindParam(':id', $id, PDO::PARAM_STR);
    $result->bindParam(':email', $newUserData['email'], PDO::PARAM_STR);
    // Возвращаем true в случае успешного завершения записи, а в случае возникновения ошибки возвращаем false
    return $result->execute();
  }

  /**
   * Редактировать пароль пользователя
   *
   * @param array $newUserPassword Новые данные пользователя
   * @return boolean
   */
  public static function editPassword($newUserPassword) {
    // Соединение с БД
    $db = Db::getConnection();
    // Хешируем пароль
    $newUserPassword = md5($newUserPassword);
    // Получаем id пользователя
    $id = self::isLogged();
    $sql = 'UPDATE Auth
            SET password = :password
            WHERE teacher_id = :id
            ';
    $result = $db->prepare($sql);
    $result->bindParam(':password', $newUserPassword, PDO::PARAM_STR);
    $result->bindParam(':id', $id, PDO::PARAM_INT);
    // Возвращаем true в случае успешного завершения записи, а в случае возникновения ошибки возвращаем false
    return $result->execute();
  }

  /**
   * Получить должность пользователя
   *
   * @param int $positionId Идентификатор должности
   * @return string
   */
  public static function getUserPosition($positionId) {
    // Соединение с БД
    $db = Db::getConnection();
    // Получаем id пользователя
    $id = self::isLogged();
    $sql = 'SELECT position_title FROM Positions
            WHERE position_id = :position_id';
    $result = $db->prepare($sql);
    $result->bindParam(':position_id', $positionId, PDO::PARAM_INT);
    $result->execute();
    $result = $result->fetch();
    // Если наименование должности успешно получено
    if ($result) {
      // Возвращаем наименование должности
      return $result['position_title'];
    }
    // Возвращаем ???
    return '???';
  }

  /**
   * Получить ученую степень пользователя
   *
   * @param int $degreeId Идентификатор ученой степени
   * @return string
   */
  public static function getUserAcademicDegree($degreeId) {
    // Соединение с БД
    $db = Db::getConnection();
    // Получаем id пользователя
    $id = self::isLogged();
    $sql = 'SELECT degree_title FROM Degrees
            WHERE degree_id = :degreeId';
    $result = $db->prepare($sql);
    $result->bindParam(':degreeId', $degreeId, PDO::PARAM_INT);
    $result->execute();
    $result = $result->fetch();
    // Если наименование ученой степени успешно получено
    if ($result) {
      // Возвращаем наименование ученой степени
      return $result['degree_title'];
    }
    // Возвращаем ???
    return '???';
  }

  /**
   * Получить ученое звание пользователя
   *
   * @param int $titleId Идентификатор ученого звания
   * @return string
   */
  public static function getUserAcademicTitle($titleId) {
    // Соединение с БД
    $db = Db::getConnection();
    // Получаем id пользователя
    $id = self::isLogged();
    $sql = 'SELECT title_title FROM Titles
            WHERE title_id = :titleId';
    $result = $db->prepare($sql);
    $result->bindParam(':titleId', $titleId, PDO::PARAM_INT);
    $result->execute();
    $result = $result->fetch();
    // Если наименование ученого звания успешно получено
    if ($result) {
      // Возвращаем наименование ученого звания
      return $result['title_title'];
    }
    // Возвращаем ???
    return '???';
  }

  /**
   * Получить название кафедры пользователя
   *
   * @param int $departmentId Идентификатор кафедры
   * @return string
   */
  public static function getUserDepartment($departmentId) {
    // Соединение с БД
    $db = Db::getConnection();
    // Получаем id пользователя
    $id = self::isLogged();
    $sql = 'SELECT department_title FROM Departments
            WHERE department_id = :departmentId';
    $result = $db->prepare($sql);
    $result->bindParam(':departmentId', $departmentId, PDO::PARAM_INT);
    $result->execute();
    $result = $result->fetch();
    // Если наименование кафедры успешно получено
    if ($result) {
      // Возвращаем наименование кафедры
      return $result['department_title'];
    }
    // Возвращаем ???
    return '???';
  }

}
