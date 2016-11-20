<?php
 //file: view/maquinas/register.php

 require_once(__DIR__."/../../core/ViewManager.php");
 $view = ViewManager::getInstance();
 $errors = $view->getVariable("errors");
 $tabla = $view->getVariable("tabla");
 $view->setVariable("title", "edit");
?>

<div class="col-md-12 button-buffer">
  <h1><?= i18n("Editar tabla")?></h1>
  <form action="index.php?controller=tablas&amp;action=edit&amp;id=<?= $tabla->getId() ?>" method="POST">
  <div class="form-group">
      <label><?= i18n("Nombre")?>:</label>
      <input type="text" class="form-control" name="nombre"	value="<?= $tabla->getNombre() ?>">
      <?= isset($errors["nombre"])?$errors["nombre"]:"" ?>
  </div>
  <div class="form-group">
      <label><?= i18n("Numero ejercicios")?>:</label>
      <input type="text" class="form-control" name="num_ejercicios"	value="<?= $tabla->getNum_ejercicios() ?>">
      <?= isset($errors["num_ejercicios"])?$errors["num_ejercicios"]:"" ?>
  </div>
  <div class="form-group">
            <label><?= i18n("Tipo")?>:</label>
            <select name="tipo" class="form-control">
              <option value="resistencia" selected> <?= i18n("Resistencia") ?> </option>
              <option value="flexibilidad"> <?= i18n("Flexibilidad") ?> </option>
              <option value="fuerza"> <?= i18n("Fuerza") ?> </option>
            </select>
            <div class="help-block">
              <?= isset($errors["tipo"])?$errors["tipo"]:"" ?>
  </div>

   <div class="form-group">
            <label><?= i18n("Dificultad")?>:</label>
            <select name="dificultad" class="form-control">
              <option value="alta" selected> <?= i18n("Alta") ?> </option>
              <option value="media"> <?= i18n("Media") ?> </option>
              <option value="baja"> <?= i18n("Baja") ?> </option>
            </select>
            <div class="help-block">
              <?= isset($errors["dificultad"])?$errors["dificultad"]:"" ?>
   </div>
    <input type="submit" class="btn btn-warning" name="submit" value="<?= i18n("Editar tabla")?>">

  </form>
</div>

