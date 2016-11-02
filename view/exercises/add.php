<?php
 //file: view/posts/add.php
 require_once(__DIR__."/../../core/ViewManager.php");
 $view = ViewManager::getInstance();

 $exercise = $view->getVariable("exercise");
 $errors = $view->getVariable("errors");

 $view->setVariable("title", "Add exercise");

?><h1><?= i18n("Add exercise")?></h1>
  <form action="index.php?controller=exercises&amp;action=add" method="POST">
    <?= i18n("Name")?>: <input type="text" name="name"	value="<?= $exercise->getName() ?>">
    <?= isset($errors["name"])?$errors["name"]:"" ?><br>

    <?= i18n("Type")?>: <select name="type">
                          <option value="endurance" selected> <?= i18n("Endurance") ?>: </option>
                          <option value="strength"> <?= i18n("Strength") ?> </option>:
                          <option value="flexibility"> <?= i18n("Flexibility") ?>: </option>
                        </select>
    <?= isset($errors["type"])?$errors["type"]:"" ?><br>

    <?= i18n("Difficulty")?>: <select name="difficulty">
                          <option value="easy" selected> <?= i18n("Easy") ?>: </option>
                          <option value="medium"> <?= i18n("Medium") ?> </option>:
                          <option value="hard"> <?= i18n("Hard") ?>: </option>
                        </select>
    <?= isset($errors["difficulty"])?$errors["difficulty"]:"" ?><br>

    <?= i18n("Details") ?>: <br>
    <textarea name="details" rows="4" cols="50"><?=
    $exercise->getDetails() ?></textarea>
    <?= isset($errors["details"])?$errors["details"]:"" ?><br>

    <input type="submit" value="<?= i18n("Add exercise")?>">
  </form>
