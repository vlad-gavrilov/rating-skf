<?php

/**
 * Модель для работы с рейтингом
 */
class Rating
{
  /**
   * Получть рейтинг
   *
   * @return array
   */
  public static function getRating() {
    // Соединение с БД
    $db = Db::getConnection();
    // Получаем id пользователя
    $id = User::isLogged();
    // Сумма по всем показателям
    $total = 0;

    // Выборка из OD_table
    $sum = 0;
    $sql = 'SELECT * FROM OD_table
            WHERE teacher_id = :teacher_id';
    $result = $db->prepare($sql);
    $result->bindParam(':teacher_id', $id, PDO::PARAM_INT);
    $result->execute();
    $rating['OD']['data'] = $result->fetch(PDO::FETCH_NUM);
    // Выбрасываем первый элемент
    array_shift($rating['OD']['data']);
    // Считаем сумму
    foreach ($rating['OD']['data'] as $key => $value) {
      $sum += $value;
    }
    $rating['OD']['sum'] = $sum;
    $total += $sum;

    // Выборка из OP_table
    $sum = 0;
    $sql = 'SELECT * FROM OP_table
            WHERE teacher_id = :teacher_id';
    $result = $db->prepare($sql);
    $result->bindParam(':teacher_id', $id, PDO::PARAM_INT);
    $result->execute();
    $rating['OP']['data'] = $result->fetch(PDO::FETCH_NUM);
    // Выбрасываем первый элемент
    array_shift($rating['OP']['data']);
    // Считаем сумму
    foreach ($rating['OP']['data'] as $key => $value) {
      $sum += $value;
    }
    $rating['OP']['sum'] = $sum;
    $total += $sum;

    // Выборка из ND_table
    $sum = 0;
    $sql = 'SELECT * FROM ND_table
            WHERE teacher_id = :teacher_id';
    $result = $db->prepare($sql);
    $result->bindParam(':teacher_id', $id, PDO::PARAM_INT);
    $result->execute();
    $rating['ND']['data'] = $result->fetch(PDO::FETCH_NUM);
    // Выбрасываем первый элемент
    array_shift($rating['ND']['data']);
    // Считаем сумму
    foreach ($rating['ND']['data'] as $key => $value) {
      $sum += $value;
    }
    $rating['ND']['sum'] = $sum;
    $total += $sum;

    // Выборка из NP_table
    $sum = 0;
    $sql = 'SELECT * FROM NP_table
            WHERE teacher_id = :teacher_id';
    $result = $db->prepare($sql);
    $result->bindParam(':teacher_id', $id, PDO::PARAM_INT);
    $result->execute();
    $rating['NP']['data'] = $result->fetch(PDO::FETCH_NUM);
    // Выбрасываем первый элемент
    array_shift($rating['NP']['data']);
    // Считаем сумму
    foreach ($rating['NP']['data'] as $key => $value) {
      $sum += $value;
    }
    $rating['NP']['sum'] = $sum;
    $total += $sum;

    // Выборка из R_table
    $sum = 0;
    $sql = 'SELECT * FROM R_table
            WHERE teacher_id = :teacher_id';
    $result = $db->prepare($sql);
    $result->bindParam(':teacher_id', $id, PDO::PARAM_INT);
    $result->execute();
    $rating['R']['data'] = $result->fetch(PDO::FETCH_NUM);
    // Выбрасываем первый элемент
    array_shift($rating['R']['data']);
    // Считаем сумму
    foreach ($rating['R']['data'] as $key => $value) {
      $sum += $value;
    }
    $rating['R']['sum'] = $sum;
    $total += $sum;

    $rating['total'] = $total;

    return $rating;
  }

  /**
   * Получить коэффициент
   *
   * @return integer
   */
  public static function getCoefficient() {
    // Соединение с БД
    $db = Db::getConnection();
    // Получаем id пользователя
    $id = User::isLogged();
    $sql = 'SELECT coefficient FROM Teachers
            WHERE id = :id';
    $result = $db->prepare($sql);
    $result->bindParam(':id', $id, PDO::PARAM_INT);
    $result->execute();
    $coefficient = $result->fetch();
    // Если коэффициент успешно получен
    if ($coefficient) {
      // Возвращаем коэффициент
      return $coefficient['coefficient'];
    }
    // Возвращаем 1
    return 1;
  }

  /**
   * Редактировать данные рейтинга
   *
   * @param array $newRatingData Новые данные рейтинга
   * @return boolean
   */
  public static function edit($newRatingData) {
    // Соединение с БД
    $db = Db::getConnection();
    // Получаем id пользователя
    $id = User::isLogged();
    $sql = 'UPDATE OD_table
            SET od1 = :od1,
                od2 = :od2,
                od3 = :od3,
                od4 = :od4,
                od5 = :od5,
                od6 = :od6,
                od7 = :od7,
                od8 = :od8,
                od9 = :od9,
                od10 = :od10
            WHERE teacher_id = :id;

            UPDATE OP_table
            SET op1 = :op1,
                op2 = :op2,
                op3 = :op3,
                op4 = :op4,
                op5 = :op5
            WHERE teacher_id = :id;

            UPDATE ND_table
            SET nd1 = :nd1
            WHERE teacher_id = :id;

            UPDATE NP_table
            SET np1 = :np1,
                np2 = :np2,
                np3 = :np3,
                np4 = :np4,
                np5 = :np5,
                np6 = :np6,
                np7 = :np7,
                np8 = :np8,
                np9 = :np9
            WHERE teacher_id = :id;

            UPDATE R_table
            SET r1 = :r1,
                r2 = :r2,
                r3 = :r3
            WHERE teacher_id = :id;
            ';

    $result = $db->prepare($sql);
    $result->bindParam(':id', $id, PDO::PARAM_STR);

    $result->bindParam(':od1', $newRatingData['OD1'], PDO::PARAM_INT);
    $result->bindParam(':od2', $newRatingData['OD2'], PDO::PARAM_INT);
    $result->bindParam(':od3', $newRatingData['OD3'], PDO::PARAM_INT);
    $result->bindParam(':od4', $newRatingData['OD4'], PDO::PARAM_INT);
    $result->bindParam(':od5', $newRatingData['OD5'], PDO::PARAM_INT);
    $result->bindParam(':od6', $newRatingData['OD6'], PDO::PARAM_INT);
    $result->bindParam(':od7', $newRatingData['OD7'], PDO::PARAM_INT);
    $result->bindParam(':od8', $newRatingData['OD8'], PDO::PARAM_INT);
    $result->bindParam(':od9', $newRatingData['OD9'], PDO::PARAM_INT);
    $result->bindParam(':od10', $newRatingData['OD10'], PDO::PARAM_INT);

    $result->bindParam(':op1', $newRatingData['OP1'], PDO::PARAM_INT);
    $result->bindParam(':op2', $newRatingData['OP2'], PDO::PARAM_INT);
    $result->bindParam(':op3', $newRatingData['OP3'], PDO::PARAM_INT);
    $result->bindParam(':op4', $newRatingData['OP4'], PDO::PARAM_INT);
    $result->bindParam(':op5', $newRatingData['OP5'], PDO::PARAM_INT);

    $result->bindParam(':nd1', $newRatingData['ND1'], PDO::PARAM_INT);

    $result->bindParam(':np1', $newRatingData['NP1'], PDO::PARAM_INT);
    $result->bindParam(':np2', $newRatingData['NP2'], PDO::PARAM_INT);
    $result->bindParam(':np3', $newRatingData['NP3'], PDO::PARAM_INT);
    $result->bindParam(':np4', $newRatingData['NP4'], PDO::PARAM_INT);
    $result->bindParam(':np5', $newRatingData['NP5'], PDO::PARAM_INT);
    $result->bindParam(':np6', $newRatingData['NP6'], PDO::PARAM_INT);
    $result->bindParam(':np7', $newRatingData['NP7'], PDO::PARAM_INT);
    $result->bindParam(':np8', $newRatingData['NP8'], PDO::PARAM_INT);
    $result->bindParam(':np9', $newRatingData['NP9'], PDO::PARAM_INT);

    $result->bindParam(':r1', $newRatingData['R1'], PDO::PARAM_INT);
    $result->bindParam(':r2', $newRatingData['R2'], PDO::PARAM_INT);
    $result->bindParam(':r3', $newRatingData['R3'], PDO::PARAM_INT);

    // Возвращаем true в случае успешного завершения записи, а в случае возникновения ошибки возвращаем false
    return $result->execute();
  }

}
