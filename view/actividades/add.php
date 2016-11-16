<?php
 //file: view/maquinas/register.php

 require_once(__DIR__."/../../core/ViewManager.php");
 $view = ViewManager::getInstance();
 $errors = $view->getVariable("errors");
 $actividad = $view->getVariable("actividad");
 $view->setVariable("title", "Add activity");
?>
<h1><?= i18n("Add activity")?></h1>
<form action="index.php?controller=actividades&amp;action=add" method="POST">

      <?= i18n("Full name")?>: <input type="text" name="nombre"	value="<?= $actividad->getNombre() ?>">
      <?= isset($errors["nombre"])?$errors["nombre"]:"" ?><br>

      <?= i18n("Schedule")?>: <input type="text" name="horario"	value="<?= $actividad->getHorario() ?>">
      <?= isset($errors["horario"])?$errors["horario"]:"" ?><br>

      <?= i18n("Description")?>: <input type="text" name="descripcion"	value="<?= $actividad->getDescripcion() ?>">
      <?= isset($errors["descripcion"])?$errors["descripcion"]:"" ?><br>

      <?= i18n("Capacity")?>: <input type="text" name="num_plazas"	value="<?= $actividad->getNum_plazas() ?>">
      <?= isset($errors["num_plazas"])?$errors["num_plazas"]:"" ?><br>

      <?= i18n("Coach")?>: <input type="text" name="entrenador"	value="<?= $actividad->getEntrenador() ?>">
      <?= isset($errors["entrenador"])?$errors["entrenador"]:"" ?><br>



      <input type="submit" value= <?= i18n("Add")?> >
</form>
