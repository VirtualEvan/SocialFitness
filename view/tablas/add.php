<?php
 //file: view/maquinas/register.php

 require_once(__DIR__."/../../core/ViewManager.php");
 $view = ViewManager::getInstance();
 $errors = $view->getVariable("errors");
 $tabla = $view->getVariable("tablas");
 $view->setVariable("title", "Add tabla");
?>
<h1><?= i18n("Add tabla")?></h1>
<form action="index.php?controller=tablas&amp;action=add" method="POST">

      <?= i18n("Nombre")?>: <input type="text" name="nombre"	value="">
      <?= isset($errors["nombre"])?$errors["nombre"]:"" ?><br>

      <?= i18n("Num ejercicios")?>: <input type="text" name="num_ejercicios"	value="">
      <?= isset($errors["num_ejercicios"])?$errors["num_ejercicios"]:"" ?><br>

      <?= i18n("Tipo")?>: <input type="text" name="tipo"	value="">
      <?= isset($errors["tipo"])?$errors["tipo"]:"" ?><br>

      <?= i18n("Dificultad")?>: <input type="text" name="dificultad"	value="">
      <?= isset($errors["dificultad"])?$errors["dificultad"]:"" ?><br>


		

      <input type="submit" value= <?= i18n("Add")?> >
</form>
