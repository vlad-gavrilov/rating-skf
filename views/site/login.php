<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=`device-width`, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Istok+Web&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Comfortaa&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/template/css/style.css">
  <title>Вход</title>
</head>

<body class="text-center">
  <?php if (isset($errors) && is_array($errors)): ?>
    <?php foreach ($errors as $error): ?>
      <div class="alert alert-danger" role="alert"><?php echo $error; ?></div>
    <?php endforeach; ?>
  <?php endif; ?>
  <div class="container login-form">
    <div class="row justify-content-center pt-5">
      <div class="col-12 col-lg-8 col-xl-6">
        <form class="form-signin border rounded p-5 shadow" action="#" method="post">
          <div class="h5 mb-4 font-weight-normal">Вход в личный кабинет</div>
          <input type="email" id="email" name="email" class="form-control mb-2 shadow-sm" placeholder="Email" required autofocus>
          <input type="password" id="inputPassword" name="password" class="form-control mb-3 shadow-sm" placeholder="Пароль" required>
          <!-- <div class="checkbox text-left">
            <label>
              <input class="shadow-sm" type="checkbox" value="remember-me">
              <span>Запомнить меня</span>
            </label>
          </div> -->
          <button class="btn btn-success btn-block shadow" type="submit" name="submit">Войти</button>
          <hr>
          <p class="text-muted">Нет аккаунта? <a href="/" class="text-decoration-none">Зарегистрируйтесь</a></p>
        </form>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
