<?php include_once(ROOT . '/views/layouts/header.php'); ?>

<div class="content container-fluid py-3">
  <div class="row">
    <div class="col col-12 col-md-6">
      <table class="table table-bordered">
        <thead>
          <tr class="text-center">
            <td colspan="2">Общая информация</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Фамилия: </td>
            <td class="font-weight-bold"><?php echo $userData['last_name']; ?></td>
          </tr>
          <tr>
            <td>Имя: </td>
            <td class="font-weight-bold"><?php echo $userData['first_name']; ?></td>
          </tr>
          <tr>
            <td>Отчество: </td>
            <td class="font-weight-bold"><?php echo $userData['patronymic']; ?></td>
          </tr>
          <tr>
            <td>Коэффициент: </td>
            <td class="font-weight-bold"><?php echo $userData['coefficient']; ?></td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="col col-12 col-md-6">
      <table class="table table-bordered">
        <thead>
          <tr class="text-center">
            <td colspan="2">Академическая информация</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Должность: </td>
            <td class="font-weight-bold"><?php echo $userTitle; ?></td>
          </tr>
          <tr>
            <td>Ученая степень: </td>
            <td class="font-weight-bold"><?php echo $userAcademicDegree; ?></td>
          </tr>
          <tr>
            <td>Ученое звание: </td>
            <td class="font-weight-bold"><?php echo $userAcademicTitle; ?></td>
          </tr>
          <tr>
            <td>Кафедра: </td>
            <td class="font-weight-bold"><?php echo $userAcademicDepartment; ?></td>
          </tr>
        </tbody>
      </table>
    </div>

  </div>

  <div class="row">
    <div class="col-12 col-md-3 mt-1">
      <a href="/edit" class="btn btn-primary btn-block">Редактировать данные</a>
    </div>
    <div class="col-12 col-md-3 mt-1">
      <a href="/rating" class="btn btn-info btn-block">Cмотреть рейтинг</a>
    </div>
    <div class="col-12 col-md-3 mt-1">
      <a href="/rating/edit" class="btn btn-success btn-block">Редактировать рейтинг</a>
    </div>
    <div class="col-12 col-md-3 mt-1">
      <a href="/logout" class="btn btn-danger btn-block">Выйти</a>
    </div>
  </div>

  </div>
</div>

<?php include_once(ROOT . '/views/layouts/footer.php'); ?>
