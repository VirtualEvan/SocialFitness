<?php
 //file: view/maquinas/register.php

 require_once(__DIR__."/../../core/ViewManager.php");
 $view = ViewManager::getInstance();
 $errors = $view->getVariable("errors");
 $session = $view->getVariable("session");
 $view->setVariable("title", "Edit session");
////////////////////////////////////////////////////////
$currentuser = $view->getVariable("currentusername");
$currentuserid = $view->getVariable("currentuserid");
if (!isset($currentuser)){
  $view->redirect("users", "login");
}
///////////////////////////////////////////////////////////
?>


<h1><?= i18n("Edit Session")?></h1>
<div class="col-md-6">
<form action="index.php?controller=sessions&amp;action=edit&amp;id=<?= $session->getID() ?>" method="POST">
    <div class="form-group">
      <?= i18n("Name")?>: <input type="text" name="name"	value="<?= $session->getName() ?>" >
      <?= isset($errors["name"])?$errors["name"]:"" ?><br>
    </div>
    <div class="form-group" >
      <?= i18n("Description")?>: <input type="text" name="description_session" value="<?= $session->getDescription() ?>">
      <?= isset($errors["description_session"])?$errors["description_session"]:"" ?><br>
      </div>
    <div class="form-group">
      <?= i18n("Time")?>: <input type="text" name="time" value="<?= $session->getTime() ?>">
      <?= isset($errors["time"])?$errors["time"]:"" ?><br>
      </div>
    <div class="form-group">
      <?= i18n("Date")?>: <input type="text" name="date" value="<?= $session->getDate() ?>">
      <?= isset($errors["date"])?$errors["date"]:"" ?><br>
      </div>
      <input type="submit" name="submit" value= <?= i18n("Add")?> >
</form>

</div>
