<?php
 //file: view/maquinas/register.php

 require_once(__DIR__."/../../core/ViewManager.php");
 $view = ViewManager::getInstance();
 $errors = $view->getVariable("errors");
 $activityid = $view->getVariable("activityid");
 $view->setVariable("title", "Add reservation");
?>


<div class="col-md-12 button-buffer">
  <h1><?= i18n("Add reservation")?></h1>
  <form action="index.php?controller=reservations&amp;action=add&amp;id=<?=$activityid?>" method="POST">

    <div class="form-group">
      <label><?= i18n("Schedule")?>:</label>
      <input type="text" class="form-control" name="horario"   value="">
      <div class="help-block">
        <?= isset($errors["horario"])?$errors["horario"]:"" ?>
      </div>
    </div>

    <div class="form-group">
      <label><?= i18n("Seating Capacity")?>:</label>
      <input type="text" class="form-control" name="num_plazas"   value="">
      <div class="help-block">
        <?= isset($errors["num_plazas"])?$errors["num_plazas"]:"" ?>
      </div>
    </div>

    <input type="submit" class="btn btn-info" value= <?= i18n("Add")?> >
  </form>
    </div>
