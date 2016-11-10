<?php
 //file: view/posts/index.php

 require_once(__DIR__."/../../core/ViewManager.php");
 $view = ViewManager::getInstance();

 $maquina = $view->getVariable("maquina");
 $currentmaquina = $view->getVariable("currentmaquinaname");

 $view->setVariable("title", i18n("View maquina"));

?><h1><?=i18n("Main page")?></h1>

<table border="2">
  <tr>
    <th><?= i18n("Name")?></th>
    <th><?= i18n("Ubicacion")?></th>

  </tr>

  <tr>
    <td>
      <?= htmlentities( $maquina->getUbicacion() ) ?></a>

    </td>
    <td>
        <?= htmlentities( $maquina->getName() ) ?></a>
    </td>

  </tr>
</table>
