<?php
 //file: view/maquinas/register.php

 require_once(__DIR__."/../../core/ViewManager.php");
 $view = ViewManager::getInstance();
 $errors = $view->getVariable("errors");
 $maquina = $view->getVariable("Maquina");
 $view->setVariable("title", "Add maquina");
?>
<h1><?= i18n("Add maquina")?></h1>
<form action="index.php?controller=maquinas&amp;action=add" method="POST">

      <?= i18n("Full name")?>: <input type="text" name="name"	value="">
      <?= isset($errors["name"])?$errors["name"]:"" ?><br>

			<?= i18n("Ubicacion")?>: <input type="text" name="ubicacion" value="">
      <?= isset($errors["ubicacion"])?$errors["ubicacion"]:"" ?><br>

      <input type="submit" value= <?= i18n("Add")?> >
</form>
