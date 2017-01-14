<?php
 //file: view/maquinas/register.php
 require_once(__DIR__."/../../core/ViewManager.php");
 $view = ViewManager::getInstance();
 $errors = $view->getVariable("errors");
 $reservation = $view->getVariable("reservation");
 $actividad = $view->getVariable("activity");
 $view->setVariable("title", "Edit reservation");
?>

<div class="col-md-12 button-buffer">
  <h1><?= i18n("Edit reservation")?></h1>
  <form action="index.php?controller=reservations&amp;activity=<?=$actividad?>&amp;action=edit&amp;id=<?= $reservation->getId() ?>" method="POST">

  <div class="form-group">
      <label><?= i18n("Schedule")?>:</label>
      <input type="text" class="form-control" name="horario" value="<?= $reservation->getHorario() ?>">
      <?= isset($errors["horario"])?$errors["horario"]:"" ?>
  </div>

  <div class="form-group">
      <label><?= i18n("Seating Capacity")?>:</label>
      <input type="text" class="form-control" name="num_plazas" value="<?= $reservation->getNum_plazas() ?>">
      <?= isset($errors["num_plazas"])?$errors["num_plazas"]:"" ?>
  </div>

  <input type="submit" class="btn btn-warning" name="submit" value="<?= i18n("Edit")?>">
  </form>

</div>