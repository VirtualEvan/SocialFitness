<?php
 //file: view/maquinas/register.php

 require_once(__DIR__."/../../core/ViewManager.php");
 $view = ViewManager::getInstance();
 $errors = $view->getVariable("errors");
 $actividad = $view->getVariable("actividad");
 $view->setVariable("title", "edit");
?>
<h1><?= i18n("Edit actividad")?></h1>
<form action="index.php?controller=actividad&amp;action=edit&amp;id=<?= $actividad->getId() ?>" method="POST">
      <?= i18n("Full name")?>: <input type="text" name="nombre"	value="">
      <?= isset($errors["nombre"])?$errors["nombre"]:"" ?><br>

      <?= i18n("Horario")?>: <input type="text" name="horario"	value="">
      <?= isset($errors["horario"])?$errors["horario"]:"" ?><br>

      <?= i18n("Descripcion")?>: <input type="text" name="descripcion"	value="">
      <?= isset($errors["descripcion"])?$errors["descripcion"]:"" ?><br>

      <?= i18n("Num Plazas")?>: <input type="text" name="num_plazas"	value="">
      <?= isset($errors["num_plazas"])?$errors["num_plazas"]:"" ?><br>

      <?= i18n("Entrenador")?>: <input type="text" name="entrenador"	value="">
      <?= isset($errors["entrenador"])?$errors["entrenador"]:"" ?><br>

		

      <input type="submit" value= <?= i18n("Edit")?> >
</form>
