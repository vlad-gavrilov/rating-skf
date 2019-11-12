<?php include_once(ROOT . '/views/layouts/header.php'); ?>

<div class="content container-fluid py-3">
  <div class="table-responsive-sm">
    <table class="table table-sm table-bordered table-striped">
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
        <th scope="col" class="align-middle">Σ</th>
      </tr>
    </thead>
    <tbody>
      <tr class="text-center">
        <td class="align-middle">ОД</td>
        <?php $i = 0; while ($i < 10):?>
        <td class="align-middle">
          <?php if (isset($rating['OD']['data'][$i])) echo $rating['OD']['data'][$i]; ?>
        </td>
        <?php $i++; endwhile; ?>
        <td class="align-middle"><?php echo $rating['OD']['sum'] ?></td>
      </tr>

      <tr class="text-center">
        <td class="align-middle">ОП</td>
        <?php $i = 0; while ($i < 10):?>
        <td class="align-middle">
          <?php if (isset($rating['OP']['data'][$i])) echo $rating['OP']['data'][$i]; ?>
        </td>
        <?php $i++; endwhile; ?>
        <td class="align-middle"><?php echo $rating['OP']['sum'] ?></td>
      </tr>

      <tr class="text-center">
        <td class="align-middle">НД</td>
        <?php $i = 0; while ($i < 10):?>
        <td class="align-middle">
          <?php if (isset($rating['ND']['data'][$i])) echo $rating['ND']['data'][$i]; ?>
        </td>
        <?php $i++; endwhile; ?>
        <td class="align-middle"><?php echo $rating['ND']['sum'] ?></td>
      </tr>

      <tr class="text-center">
        <td class="align-middle">НП</td>
        <?php $i = 0; while ($i < 10):?>
        <td class="align-middle">
          <?php if (isset($rating['NP']['data'][$i])) echo $rating['NP']['data'][$i]; ?>
        </td>
        <?php $i++; endwhile; ?>
        <td class="align-middle"><?php echo $rating['NP']['sum'] ?></td>
      </tr>

      <tr class="text-center">
        <td class="align-middle">Р</td>
        <?php $i = 0; while ($i < 10):?>
        <td class="align-middle">
          <?php if (isset($rating['R']['data'][$i])) echo $rating['R']['data'][$i]; ?>
        </td>
        <?php $i++; endwhile; ?>
        <td class="align-middle"><?php echo $rating['R']['sum'] ?></td>
      </tr>
    </tbody>
  </table>
  </div>
  <table class="table table-sm table-bordered table-hover">
    <tbody>
      <tr>
        <td>Итоговый показатель</td>
        <td><?php echo $rating['total']; ?></td>
      </tr>
      <tr>
        <td>Коэффициент повседневной деятельности</td>
        <td><?php echo $coefficient; ?></td>
      </tr>
      <tr>
        <td>Итоговый показатель с учетом повседневной деятельности</td>
        <td><?php echo $rating['total'] * $coefficient; ?></td>
      </tr>
    </tbody>
  </table>
  <div> <a href="/rating/edit" class="btn btn-primary btn-block">Редактировать таблицу</a> </div>
</div>

<?php include_once(ROOT . '/views/layouts/footer.php'); ?>
