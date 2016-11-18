<?php
 //file: view/maquinas/register.php

 require_once(__DIR__."/../../core/ViewManager.php");
 $view = ViewManager::getInstance();
 $errors = $view->getVariable("errors");
 $maquina = $view->getVariable("Session");
 $view->setVariable("title", "Add session");

 require_once(__DIR__."/../../core/ViewManager.php");
 $view = ViewManager::getInstance();
 $currentuser = $view->getVariable("currentusername");
 $currentuserid = $view->getVariable("currentuserid");
 if (!isset($currentuser)){
   $view->redirect("users", "login");
 }
?>
    <h1><?= i18n("Add session")?></h1>
    <form action="index.php?controller=sessions&amp;action=add&amp;id=<?= $currentuserid ?>" method="POST">
      <div class="form-group">
          <?= i18n("Full name")?>: <input type="text" name="name" value="">
          <?= isset($errors["name"])?$errors["name"]:"" ?><br>
        </div>
    <div class="form-group">
    	  <?= i18n("description_session")?>: <input type="text" name="description_session" value="">
          <?= isset($errors["description_session"])?$errors["description_session"]:"" ?><br>
          </div>
    <div class="form-group">
    	  <?= i18n("id_user")?>: <input type="text" name="id_user" value=<?= $currentuserid ?>>
          <?= isset($errors["id_user"])?$errors["id_user"]:"" ?><br>
          </div>

    <div class="form-group">
    	  <?= i18n("tiempo")?>: <input type="text" name="time" value="">
          <?= isset($errors["time"])?$errors["time"]:"" ?><br>
          </div>

    <div class="form-group">
    	<?= i18n("data")?>: <input type="text" name="date" value="">
          <?= isset($errors["data"])?$errors["data"]:"" ?><br>
    <div class="form-group">
          <input type="submit" value= <?= i18n("Add")?> >
        </div>
      </div>
    </form>
