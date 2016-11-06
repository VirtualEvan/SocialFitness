<?php
 //file: view/posts/add.php
 require_once(__DIR__."/../../core/ViewManager.php");
 $view = ViewManager::getInstance();

 $exercise = $view->getVariable("exercise");
 $errors = $view->getVariable("errors");

 $view->setVariable("title", "Add exercise");
?>

<div class="col-md-12">
  <h1><?= i18n("Add exercise")?></h1>
  <form action="index.php?controller=exercises&amp;action=add" method="POST">
    <div class="form-group">
      <label><?= i18n("Name")?>:</label>
      <input type="text" class="form-control" name="name"	value="<?= $exercise->getName() ?>">
      <?= isset($errors["name"])?$errors["name"]:"" ?>
    </div>

    <div class="form-group">
      <label><?= i18n("Type")?>:</label>
      <select name="type" class="form-control">
        <option value="endurance" selected> <?= i18n("Endurance") ?>: </option>
        <option value="strength"> <?= i18n("Strength") ?> </option>:
        <option value="flexibility"> <?= i18n("Flexibility") ?>: </option>
      </select>
      <?= isset($errors["type"])?$errors["type"]:"" ?>
    </div>

    <div class="form-group">
      <label><?= i18n("Difficulty")?>:</label>
      <select name="difficulty" class="form-control">
        <option value="easy" selected> <?= i18n("Easy") ?>: </option>
        <option value="medium"> <?= i18n("Medium") ?> </option>:
        <option value="hard"> <?= i18n("Hard") ?>: </option>
      </select>
      <?= isset($errors["difficulty"])?$errors["difficulty"]:"" ?>
    </div>

    <div class="form-group">
      <label><?= i18n("Details") ?>:</label>
      <textarea name="details" class="form-control" rows="4" cols="50"><?= $exercise->getDetails() ?></textarea>
      <?= isset($errors["details"])?$errors["details"]:"" ?>
    </div>
    <input type="submit" class="btn btn-info" value="<?= i18n("Add")?>">
  </form>
</div>
