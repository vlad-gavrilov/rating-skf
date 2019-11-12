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

          <div class="h5 mb-4 font-weight-normal">Редактирование данных пользователя</div>

          <div class="form-row">
            <div class="form-group col-lg-4">
              <label for="lastName">Фамилия</label>
              <input name="last_name" type="text" class="form-control" id="lastName" value="<?php echo $this->userInfo['last_name'] ?>">
            </div>
            <div class="form-group col-lg-4">
              <label for="firstName">Имя</label>
              <input name="first_name" type="text" class="form-control" id="firstName" value="<?php echo $this->userInfo['first_name'] ?>">
            </div>
            <div class="form-group col-lg-4">
              <label for="patronymic">Отчество</label>
              <input name="patronymic" type="text" class="form-control" id="patronymic" value="<?php echo $this->userInfo['patronymic'] ?>">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="position">Должность</label>
              <select id="position" class="form-control" name="position">
                <option value="1" <?php if($this->userInfo['position'] == 1) echo "selected"; ?>>ассистент</option>
                <option value="2" <?php if($this->userInfo['position'] == 2) echo "selected"; ?>>преподаватель</option>
                <option value="3" <?php if($this->userInfo['position'] == 3) echo "selected"; ?>>старший преподаватель</option>
                <option value="4" <?php if($this->userInfo['position'] == 4) echo "selected"; ?>>доцент</option>
                <option value="5" <?php if($this->userInfo['position'] == 5) echo "selected"; ?>>профессор</option>
                <option value="6" <?php if($this->userInfo['position'] == 6) echo "selected"; ?>>заведующий кафедрой</option>
                <option value="7" <?php if($this->userInfo['position'] == 7) echo "selected"; ?>>декан факультета</option>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label for="academic_degree">Ученая степень</label>
              <select id="academic_degree" class="form-control" name="academic_degree">
                <option value="1" <?php if($this->userInfo['academic_degree'] == 1) echo "selected"; ?>>младший научный сотрудник</option>
                <option value="2" <?php if($this->userInfo['academic_degree'] == 2) echo "selected"; ?>>старший научный сотрудник</option>
                <option value="3" <?php if($this->userInfo['academic_degree'] == 3) echo "selected"; ?>>кандидат наук</option>
                <option value="4" <?php if($this->userInfo['academic_degree'] == 4) echo "selected"; ?>>доктор наук</option>
                <option value="5" <?php if($this->userInfo['academic_degree'] == 5) echo "selected"; ?>>член-корреспондент</option>
                <option value="6" <?php if($this->userInfo['academic_degree'] == 6) echo "selected"; ?>>академик</option>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label for="academic_title">Ученое звание</label>
              <select id="academic_title" class="form-control" name="academic_title">
                <option value="1" <?php if($this->userInfo['academic_title'] == 1) echo "selected"; ?>>доцент</option>
                <option value="2" <?php if($this->userInfo['academic_title'] == 2) echo "selected"; ?>>профессор</option>
              </select>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-1">
              <label for="coef">Коэффициент</label>
              <select id="coef" class="form-control" name="coefficient">
                <option value="1" <?php if($this->userInfo['coefficient'] == 1) echo "selected"; ?>>1</option>
                <option value="2" <?php if($this->userInfo['coefficient'] == 2) echo "selected"; ?>>2</option>
                <option value="3" <?php if($this->userInfo['coefficient'] == 3) echo "selected"; ?>>3</option>
                <option value="4" <?php if($this->userInfo['coefficient'] == 4) echo "selected"; ?>>4</option>
              </select>
            </div>
            <div class="form-group col-md-6">
              <label for="dep">Кафедра</label>
              <select id="dep" class="form-control" name="department">
                <option value="1" <?php if($this->userInfo['department'] == 1) echo "selected"; ?>>инфокоммуникационных технологий и систем связи</option>
                <option value="2" <?php if($this->userInfo['department'] == 2) echo "selected"; ?>>информатики и вычислительной техники</option>
                <option value="3" <?php if($this->userInfo['department'] == 3) echo "selected"; ?>>общенаучной подготовки</option>
                <option value="4" <?php if($this->userInfo['department'] == 4) echo "selected"; ?>>научно-исследовательской работы и инновационного развития</option>
              </select>
            </div>
            <div class="form-group col-md-5">
              <label for="inputEmail">Новый email</label>
              <input name="email" type="email" class="form-control" id="inputEmail" value="<?php echo $this->userInfo['email'] ?>">
            </div>
          </div>

          <div class="form-row">
            <div class="col-12 col-md-6"><button name="submit" type="submit" class="btn btn-success btn-block mt-4">Сохранить изменения</button></div>
            <div class="col-12 col-md-6"><a class="btn btn-danger btn-block mt-4" href="/edit" role="button">Сбросить</a></div>
          </div>
        </form>
      <?php endif; ?>
      </div>
    </div>
    <div class="row mb-3">
    <div class="col-12"><a href="/edit/password" class="btn btn-outline-primary btn-block">Сменить пароль</a></div>
    </div>
  </div>
</div>

<?php include_once(ROOT . '/views/layouts/footer.php'); ?>
