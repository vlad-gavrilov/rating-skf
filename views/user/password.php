<?php include_once(ROOT . '/views/layouts/header.php'); ?>

<div class="content container-fluid py-3">
  <div class="row mb-3">
    <div class="col">
      <?php if ($result): ?>
        <div class="alert alert-success" role="alert">Данные успешно изменены!</div>
        <div> <a href="/" class="btn btn-outline-success btn-block">Вернуться на главную</a> </div>
      <?php else: ?>
        <?php if (isset($errors) && is_array($errors)): ?>
          <?php foreach ($errors as $error): ?>
            <div class="alert alert-danger" role="alert"><?php echo $error; ?></div>
          <?php endforeach; ?>
        <?php endif; ?>
        <form action="#" method="post">
          <div class="h5 mb-4 font-weight-normal">Сменить пароль пользователя</div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="pwd">Новый пароль</label>
              <input type="password" name="password" class="form-control" id="pwd">
            </div>
            <div class="form-group col-md-6">
              <label for="pwdAgain">Новый пароль еще раз</label>
              <input type="password" name="passwordAgain" class="form-control" id="pwdAgain">
            </div>
          </div>
          <div class="form-row">
            <div class="col-12">
              <button name="submit" type="submit" class="btn btn-success btn-block mt-4">
                Сохранить изменения
              </button>
            </div>
          </div>
        </form>
      <?php endif; ?>
    </div>
  </div>
</div>

<?php include_once(ROOT . '/views/layouts/footer.php'); ?>
