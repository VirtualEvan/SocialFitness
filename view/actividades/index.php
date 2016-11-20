<?php
 //file: view/posts/index.php

 require_once(__DIR__."/../../core/ViewManager.php");
 $view = ViewManager::getInstance();

 $actividades = $view->getVariable("actividad");
 $currentuser = $view->getVariable("currentusername");
 $currentusertype = $view->getVariable("currentusertype");


 $view->setVariable("title", i18n("Activity  management"));

?>

<div class="col-md-12">
  <h1><?=i18n("Activities")?></h1>
  <?php
    if( $currentusertype == "admin"): ?>
      <p><a href="index.php?controller=actividades&amp;action=add" class="btn btn-info"><?= i18n("Añadir actividad") ?></a></p>
  <?php
    endif
  ?>


  <table class="table table-striped table-condensed">
      <tr class="info">
        <th><?= i18n("Nombre")?></th>
        <th><?= i18n("Horario")?></th>
        <th><?= i18n("Descripcion")?></th>
        <th><?= i18n("Capacidad")?></th>
        <th><?= i18n("Entrenador")?></th>
        <?php
          if( $currentusertype == "admin"): ?>
            <th><?= i18n("Management options")?></th>
        <?php
          endif
        ?>
      </tr>
      <?php foreach ($actividades as $actividad): ?>
      <tr>
        <td>
          <a href="index.php?controller=actividades&amp;action=view&amp;id=<?= $actividad->getId() ?>"><?= htmlentities( $actividad->getNombre() ) ?></a>
        </td>
        <td>
          <a href="index.php?controller=actividades&amp;action=view&amp;id=<?= $actividad->getId() ?>"><?= htmlentities( $actividad->getHorario() ) ?></a>
        </td>
        <td>
          <a href="index.php?controller=actividades&amp;action=view&amp;id=<?= $actividad->getId() ?>"><?= htmlentities( $actividad->getDescripcion() ) ?></a>
        </td>
         <td>
          <a href="index.php?controller=actividades&amp;action=view&amp;id=<?= $actividad->getId() ?>"><?= htmlentities( $actividad->getNum_plazas() ) ?></a>
        </td>
         <td>
          <a href="index.php?controller=actividades&amp;action=view&amp;id=<?= $actividad->getId() ?>"><?= htmlentities( $actividad->getEntrenador() ) ?></a>
        </td>
        <?php
          if( $currentusertype == "admin"): ?>
            <td>
              <a href="index.php?controller=actividades&amp;action=delete&amp;id=<?= $actividad->getId() ?>" class="btn btn-danger"><?= i18n("Delete") ?></a>
              <a href="index.php?controller=actividades&amp;action=edit&amp;id=<?= $actividad->getId() ?>" class="btn btn-warning"><?= i18n("Edit") ?></a>
            </td>
        <?php
          endif
        ?>
      </tr>
    <?php endforeach; ?>
    </table>
</div>


