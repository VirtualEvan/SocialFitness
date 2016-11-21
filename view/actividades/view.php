<?php
 //file: view/posts/index.php

 require_once(__DIR__."/../../core/ViewManager.php");
 $view = ViewManager::getInstance();

 $actividad = $view->getVariable("actividad");


 $view->setVariable("title", i18n("View activity"));

?>
<div class="col-md-12">

  <h1><?=i18n("View Activity")?></h1>

  <table class="table table-striped table-condensed">
    <tr class="info">
        <th><?= i18n("Name")?></th>
        <th><?= i18n("Schedule")?></th>
        <th><?= i18n("Description")?></th>
        <th><?= i18n("Seating Capacity")?></th>
        <th><?= i18n("Coach")?></th>
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
      <?= htmlentities( $actividad->getEntrenador()->getName() ) ?></a>
    </td>

  </tr>
</table>
