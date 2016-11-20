<?php
 //file: view/maquinas/register.php

 require_once(__DIR__."/../../core/ViewManager.php");
 $view = ViewManager::getInstance();
 $errors = $view->getVariable("errors");
 $tabla = $view->getVariable("tablas");
 $exercises = $view->getVariable("exercise");
 $view->setVariable("title", "Add tabla");
 $tables = $view->getVariable("tables");
 $actividades = $view->getVariable("actividad");
?>


<div class="col-md-12 button-buffer">
  <h1><?= i18n("Añadir tabla")?></h1>
  <form action="index.php?controller=tablas&amp;action=add" method="POST">
    <div class="form-group">
      <label><?= i18n("Nombre")?>:</label>
      <input type="text" class="form-control" name="nombre"   value="">
      <div class="help-block">
        <?= isset($errors["nombre"])?$errors["nombre"]:"" ?>
      </div>
    </div>
    <div class="form-group">
          <label><?= i18n("Numero ejercicios")?>:</label>
            <input type="text" class="form-control" name="num_ejercicios" value="">
            <div class="help-block">
              <?= isset($errors["num_ejercicios"])?$errors["num_ejercicios"]:"" ?>
            </div>
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
    </div>

    <!--<div class="form-group">
      <label><?= i18n("Ejercicios")?>:</label>
      <?php if(count($exercises) > 0): ?>
                  <select multiple class="select-con-buscador form-control" name="exercises[]">
                        <?php
                              foreach($exercises as $exercise){
        ?>
                              <option value=" <?= $exercise->getId() ?>" <?php if ( in_array($exercise->getId(),$selected) ){echo "selected";} ?>>  <?= $exercise->getName() ?> </option>;
        <?php
            }
                        ?>
                  </select>
                  <?php else: ?>
                  <div class="alert alert-info">
                        <?= i18n("There are no exercise tables defined")?>
                  </div>
                  <?php endif; ?>
      <div class="help-block">
        <?= isset($errors["type"])?$errors["type"]:"" ?>
      </div>
    </div>-->
    <div class="form-group">
      <label><?= i18n("Exercise tables")?>:</label>
     
                  <select multiple class="select-con-buscador form-control" name="tables[]">
                        <?php
                              foreach($actividades as $actividad){
                         ?>
                              <option value=" Hola">  </option>;
                         <?php
            }
                        ?>
                  </select>
                
                 
      <div class="help-block">
        <?= isset($errors["type"])?$errors["type"]:"" ?>
      </div>
    </div>


    <input type="submit" class="btn btn-info" value= <?= i18n("Add")?> >
    </form>
    </div>
