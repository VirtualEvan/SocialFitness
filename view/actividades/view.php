<?php
 //file: view/posts/index.php

 require_once(__DIR__."/../../core/ViewManager.php");
 $view = ViewManager::getInstance();

 $actividad = $view->getVariable("actividad");
 

 $view->setVariable("title", i18n("ver actividad"));

?><h1><?=i18n("Main page")?></h1>

<table border="2">
  <tr>
    <th><?= i18n("Nombre")?></th>
    <th><?= i18n("Horario")?></th>
    <th><?= i18n("Descripcion")?></th>
    <th><?= i18n("Num_Plazas")?></th>
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
