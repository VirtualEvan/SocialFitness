<?php
 //file: view/posts/index.php

 require_once(__DIR__."/../../core/ViewManager.php");
 $view = ViewManager::getInstance();

 $actividad = $view->getVariable("actividad");


 $view->setVariable("title", i18n("View activity"));

?>
<div class="col-md-12">

  <h1><?=i18n("Ver actividad")?></h1>

  <table class="table table-striped table-condensed">
    <tr class="info">
        <th><?= i18n("Name")?></th>
        <th><?= i18n("Horario")?></th>
        <th><?= i18n("Descripcion")?></th>
        <th><?= i18n("Numero Plazas")?></th>
        <th><?= i18n("Entrenador")?></th>
    </tr>

  <tr>
    <td>
      <?= htmlentities( $actividad->getNombre() ) ?></a>
    </td>
    <td>
      <?= htmlentities( $actividad->getHorario() ) ?></a>
    </td>
    <td>
      <?= htmlentities( $actividad->getDescripcion() ) ?></a>
    </td>
    <td>
      <?= htmlentities( $actividad->getNum_plazas() ) ?></a>
    </td>
    <td>
      <?= htmlentities( $actividad->getEntrenador() ) ?></a>
    </td>

  </tr>
</table>
