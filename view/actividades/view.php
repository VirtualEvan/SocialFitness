<?php
 //file: view/posts/index.php

 require_once(__DIR__."/../../core/ViewManager.php");
 $view = ViewManager::getInstance();

 $actividad = $view->getVariable("actividad");


 $view->setVariable("title", i18n("View activity"));

?><h1><?=i18n("View activity")?></h1>

<table border="2">
  <tr>
    <th><?= i18n("Full name")?></th>
    <th><?= i18n("Schedule")?></th>
    <th><?= i18n("Description")?></th>
    <th><?= i18n("Capacity")?></th>
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
      <?= htmlentities( $actividad->getEntrenador() ) ?></a>
    </td>

  </tr>
</table>
