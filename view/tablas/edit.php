<?php
 //file: view/maquinas/register.php

 require_once(__DIR__."/../../core/ViewManager.php");
 $view = ViewManager::getInstance();
 $errors = $view->getVariable("errors");
 $tabla = $view->getVariable("tabla");
 $view->setVariable("title", "edit");
?>
<h1><?= i18n("Edit tabla")?></h1>
<form action="index.php?controller=tablas&amp;action=edit&amp;id=<?= $tabla->getId() ?>" method="POST">
      <?= i18n("Full name")?>: <input type="text" name="nombre"	value="<?= $tabla->getNombre() ?>">
      <?= isset($errors["nombre"])?$errors["nombre"]:"" ?><br>

      <?= i18n("Num ejercicios")?>: <input type="text" name="num_ejercicios"	value="<?= $tabla->getNum_ejercicios() ?>">
      <?= isset($errors["num_ejercicios"])?$errors["num_ejercicios"]:"" ?><br>

      <?= i18n("Tipo")?>: <input type="text" name="tipo"	value="<?= $tabla->getTipo() ?>">
      <?= isset($errors["tipo"])?$errors["tipo"]:"" ?><br>

     <?= i18n("Dificultad")?>: <input type="text" name="dificultad"	value="<?= $tabla->getDificultad() ?>">
      <?= isset($errors["dificultad"])?$errors["dificultad"]:"" ?><br>
      



      <input type="submit" name="submit" value= <?= i18n("Edit")?> >
</form>
