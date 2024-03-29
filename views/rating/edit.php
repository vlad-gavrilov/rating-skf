<?php include_once(ROOT . '/views/layouts/header.php'); ?>

<div class="content container-fluid py-3">
  <?php if ($result): ?>
    <div class="alert alert-success" role="alert">Данные успешно изменены!</div>
    <div> <a href="/rating" class="btn btn-outline-success btn-block">Вернуться к рейтингу</a> </div>
  <?php else: ?>
    <form action="#" method="post">
      <div class="table-responsive-sm">
        <table class="table table-sm table-bordered">
        <thead>
          <tr class="text-center">
            <th scope="col" class="align-middle"></th>
            <th scope="col" class="align-middle">1</th>
            <th scope="col" class="align-middle">2</th>
            <th scope="col" class="align-middle">3</th>
            <th scope="col" class="align-middle">4</th>
            <th scope="col" class="align-middle">5</th>
            <th scope="col" class="align-middle">6</th>
            <th scope="col" class="align-middle">7</th>
            <th scope="col" class="align-middle">8</th>
            <th scope="col" class="align-middle">9</th>
            <th scope="col" class="align-middle">10</th>
          </tr>
        </thead>
        <tbody>
          <tr class="text-center">
            <td class="align-middle">ОД</td>
            <?php
              $i = 0;
              while ($i < 10) {
                if (isset($rating['OD']['data'][$i])) {
                  echo '<td class="align-middle">';
                    $n = $i + 1;
                    echo '<select class="form-control custom-select" name="OD' . $n  . '">';
                      echo ($rating['OD']['data'][$i] == 0) ? '<option value="0" selected>0</option>' : '<option value="0">0</option>';
                      echo ($rating['OD']['data'][$i] == 1) ? '<option value="1" selected>1</option>' : '<option value="1">1</option>';
                      echo ($rating['OD']['data'][$i] == 2) ? '<option value="2" selected>1</option>' : '<option value="2">2</option>';
                      echo ($rating['OD']['data'][$i] == 3) ? '<option value="3" selected>3</option>' : '<option value="3">3</option>';
                      echo ($rating['OD']['data'][$i] == 4) ? '<option value="4" selected>4</option>' : '<option value="4">4</option>';
                      echo ($rating['OD']['data'][$i] == 5) ? '<option value="5" selected>5</option>' : '<option value="5">5</option>';
                      echo ($rating['OD']['data'][$i] == 6) ? '<option value="6" selected>6</option>' : '<option value="6">6</option>';
                      echo ($rating['OD']['data'][$i] == 7) ? '<option value="7" selected>7</option>' : '<option value="7">7</option>';
                      echo ($rating['OD']['data'][$i] == 8) ? '<option value="8" selected>8</option>' : '<option value="8">8</option>';
                      echo ($rating['OD']['data'][$i] == 9) ? '<option value="9" selected>9</option>' : '<option value="9">9</option>';
                      echo ($rating['OD']['data'][$i] == 10) ? '<option value="10" selected>10</option>' : '<option value="10">10</option>';
                    echo '</select>';
                  echo '</td>';
                }
                else {
                  echo '<td></td>';
                }
                $i++;
              }
            ?>
          </tr>
          <tr class="text-center">
            <td class="align-middle">ОП</td>
            <?php
              $i = 0;
              while ($i < 10) {
                if (isset($rating['OP']['data'][$i])) {
                  echo '<td class="align-middle">';
                    $n = $i + 1;
                    echo '<select class="form-control custom-select" name="OP' . $n  . '">';
                      echo ($rating['OP']['data'][$i] == 0) ? '<option value="0" selected>0</option>' : '<option value="0">0</option>';
                      echo ($rating['OP']['data'][$i] == 1) ? '<option value="1" selected>1</option>' : '<option value="1">1</option>';
                      echo ($rating['OP']['data'][$i] == 2) ? '<option value="2" selected>1</option>' : '<option value="2">2</option>';
                      echo ($rating['OP']['data'][$i] == 3) ? '<option value="3" selected>3</option>' : '<option value="3">3</option>';
                      echo ($rating['OP']['data'][$i] == 4) ? '<option value="4" selected>4</option>' : '<option value="4">4</option>';
                      echo ($rating['OP']['data'][$i] == 5) ? '<option value="5" selected>5</option>' : '<option value="5">5</option>';
                      echo ($rating['OP']['data'][$i] == 6) ? '<option value="6" selected>6</option>' : '<option value="6">6</option>';
                      echo ($rating['OP']['data'][$i] == 7) ? '<option value="7" selected>7</option>' : '<option value="7">7</option>';
                      echo ($rating['OP']['data'][$i] == 8) ? '<option value="8" selected>8</option>' : '<option value="8">8</option>';
                      echo ($rating['OP']['data'][$i] == 9) ? '<option value="9" selected>9</option>' : '<option value="9">9</option>';
                      echo ($rating['OP']['data'][$i] == 10) ? '<option value="10" selected>10</option>' : '<option value="10">10</option>';
                    echo '</select>';
                  echo '</td>';
                }
                else {
                  echo '<td></td>';
                }
                $i++;
              }
            ?>
          </tr>
          <tr class="text-center">
            <td class="align-middle">НД</td>
            <?php
              $i = 0;
              while ($i < 10) {
                if (isset($rating['ND']['data'][$i])) {
                  echo '<td class="align-middle">';
                    $n = $i + 1;
                    echo '<select class="form-control custom-select" name="ND' . $n  . '">';
                      echo ($rating['ND']['data'][$i] == 0) ? '<option value="0" selected>0</option>' : '<option value="0">0</option>';
                      echo ($rating['ND']['data'][$i] == 1) ? '<option value="1" selected>1</option>' : '<option value="1">1</option>';
                      echo ($rating['ND']['data'][$i] == 2) ? '<option value="2" selected>1</option>' : '<option value="2">2</option>';
                      echo ($rating['ND']['data'][$i] == 3) ? '<option value="3" selected>3</option>' : '<option value="3">3</option>';
                      echo ($rating['ND']['data'][$i] == 4) ? '<option value="4" selected>4</option>' : '<option value="4">4</option>';
                      echo ($rating['ND']['data'][$i] == 5) ? '<option value="5" selected>5</option>' : '<option value="5">5</option>';
                      echo ($rating['ND']['data'][$i] == 6) ? '<option value="6" selected>6</option>' : '<option value="6">6</option>';
                      echo ($rating['ND']['data'][$i] == 7) ? '<option value="7" selected>7</option>' : '<option value="7">7</option>';
                      echo ($rating['ND']['data'][$i] == 8) ? '<option value="8" selected>8</option>' : '<option value="8">8</option>';
                      echo ($rating['ND']['data'][$i] == 9) ? '<option value="9" selected>9</option>' : '<option value="9">9</option>';
                      echo ($rating['ND']['data'][$i] == 10) ? '<option value="10" selected>10</option>' : '<option value="10">10</option>';
                    echo '</select>';
                  echo '</td>';
                }
                else {
                  echo '<td></td>';
                }
                $i++;
              }
            ?>
          </tr>
          <tr class="text-center">
            <td class="align-middle">НП</td>
            <?php
              $i = 0;
              while ($i < 10) {
                if (isset($rating['NP']['data'][$i])) {
                  echo '<td class="align-middle">';
                    $n = $i + 1;
                    echo '<select class="form-control custom-select" name="NP' . $n  . '">';
                      echo ($rating['NP']['data'][$i] == 0) ? '<option value="0" selected>0</option>' : '<option value="0">0</option>';
                      echo ($rating['NP']['data'][$i] == 1) ? '<option value="1" selected>1</option>' : '<option value="1">1</option>';
                      echo ($rating['NP']['data'][$i] == 2) ? '<option value="2" selected>1</option>' : '<option value="2">2</option>';
                      echo ($rating['NP']['data'][$i] == 3) ? '<option value="3" selected>3</option>' : '<option value="3">3</option>';
                      echo ($rating['NP']['data'][$i] == 4) ? '<option value="4" selected>4</option>' : '<option value="4">4</option>';
                      echo ($rating['NP']['data'][$i] == 5) ? '<option value="5" selected>5</option>' : '<option value="5">5</option>';
                      echo ($rating['NP']['data'][$i] == 6) ? '<option value="6" selected>6</option>' : '<option value="6">6</option>';
                      echo ($rating['NP']['data'][$i] == 7) ? '<option value="7" selected>7</option>' : '<option value="7">7</option>';
                      echo ($rating['NP']['data'][$i] == 8) ? '<option value="8" selected>8</option>' : '<option value="8">8</option>';
                      echo ($rating['NP']['data'][$i] == 9) ? '<option value="9" selected>9</option>' : '<option value="9">9</option>';
                      echo ($rating['NP']['data'][$i] == 10) ? '<option value="10" selected>10</option>' : '<option value="10">10</option>';
                    echo '</select>';
                  echo '</td>';
                }
                else {
                  echo '<td></td>';
                }
                $i++;
              }
            ?>
          </tr>
          <tr class="text-center">
            <td class="align-middle">Р</td>
            <?php
              $i = 0;
              while ($i < 10) {
                if (isset($rating['R']['data'][$i])) {
                  echo '<td class="align-middle">';
                    $n = $i + 1;
                    echo '<select class="form-control custom-select" name="R' . $n  . '">';
                      echo ($rating['R']['data'][$i] == 0) ? '<option value="0" selected>0</option>' : '<option value="0">0</option>';
                      echo ($rating['R']['data'][$i] == 1) ? '<option value="1" selected>1</option>' : '<option value="1">1</option>';
                      echo ($rating['R']['data'][$i] == 2) ? '<option value="2" selected>2</option>' : '<option value="2">2</option>';
                      echo ($rating['R']['data'][$i] == 3) ? '<option value="3" selected>3</option>' : '<option value="3">3</option>';
                      echo ($rating['R']['data'][$i] == 4) ? '<option value="4" selected>4</option>' : '<option value="4">4</option>';
                      echo ($rating['R']['data'][$i] == 5) ? '<option value="5" selected>5</option>' : '<option value="5">5</option>';
                      echo ($rating['R']['data'][$i] == 6) ? '<option value="6" selected>6</option>' : '<option value="6">6</option>';
                      echo ($rating['R']['data'][$i] == 7) ? '<option value="7" selected>7</option>' : '<option value="7">7</option>';
                      echo ($rating['R']['data'][$i] == 8) ? '<option value="8" selected>8</option>' : '<option value="8">8</option>';
                      echo ($rating['R']['data'][$i] == 9) ? '<option value="9" selected>9</option>' : '<option value="9">9</option>';
                      echo ($rating['R']['data'][$i] == 10) ? '<option value="10" selected>10</option>' : '<option value="10">10</option>';
                    echo '</select>';
                  echo '</td>';
                }
                else {
                  echo '<td></td>';
                }
                $i++;
              }
            ?>
          </tr>
        </tbody>
      </table>
      </div>
      <div class="form-row">
      <div class="col-12 col-md-6"><button name="submit" type="submit" class="btn btn-success btn-block mt-4">Сохранить изменения</button></div>
      <div class="col-12 col-md-6"><a class="btn btn-danger btn-block mt-4" href="/rating/edit" role="button">Сбросить</a></div>
    </div>
    </form>
  <?php endif; ?>
</div>

<?php include_once(ROOT . '/views/layouts/footer.php'); ?>
