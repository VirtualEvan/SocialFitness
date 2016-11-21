<?php
 //file: view/maquinas/register.php

 require_once(__DIR__."/../../core/ViewManager.php");
 $view = ViewManager::getInstance();
 $errors = $view->getVariable("errors");

 $users = $view->getVariable("users");
 $actividad = $view->getVariable("actividad");
  $selected = $view->getVariable("selected");
 $view->setVariable("title", "edit");
?>

<div class="form-group">
      <label><?= i18n("Entrenadores")?>:</label>
      <?php if(count($users) > 0): ?>
      <select multiple class="select-con-buscador form-control" name="users[]">
        <?php
          foreach($users as $user){
        ?>
          <option value=" <?= $user->getId() ?>" <?php if ( in_array($user->getId(),$selected) ){echo "selected";} ?>>  <?= $user->getName() ?> </option>;
        <?php
          }
        ?>
      </select>
      <?php else: ?>
      <div class="alert alert-info">
        <?= i18n("There are no users tables defined")?>
      </div>
      <?php endif; ?>
      <div class="help-block">
        <?= isset($errors["type"])?$errors["type"]:"" ?>
      </div>
  </div>





