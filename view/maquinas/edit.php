<?php
 //file: view/maquinas/register.php

 require_once(__DIR__."/../../core/ViewManager.php");
 $view = ViewManager::getInstance();
 $errors = $view->getVariable("errors");
 $maquina = $view->getVariable("maquina");
 $view->setVariable("title", "Edit maquina");
?>
<h1><?= i18n("Edit Maquina")?></h1>
<form action="index.php?controller=maquinas&amp;action=edit&amp;id=<?= $maquina->getId() ?>" method="POST">
      <?= i18n("Full name")?>: <input type="text" name="name"	value="<?= $maquina->getName() ?>" >
      <?= isset($errors["name"])?$errors["name"]:"" ?><br>

      <?= i18n("ubicacion")?>: <input type="text" name="ubicacion" value="<?= $maquina->getUbicacion() ?>">
      <?= isset($errors["ubicacion"])?$errors["ubicacion"]:"" ?><br>

      <input type="submit" name="submit" value= <?= i18n("Add")?> >
</form>
