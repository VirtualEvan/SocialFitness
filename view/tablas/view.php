<?php
 //file: view/posts/index.php

 require_once(__DIR__."/../../core/ViewManager.php");
 $view = ViewManager::getInstance();

 $tabla = $view->getVariable("tabla");


 $view->setVariable("title", i18n("ver tabla"));

?><h1><?=i18n("Main page")?></h1>

<table border="2">
  <tr>
    <th><?= i18n("Nombre")?></th>
    <th><?= i18n("Num ejercicios")?></th>
    <th><?= i18n("tipo")?></th>
    <th><?= i18n("Dificultad")?></th>

  </tr>

  <tr>
    <td>
      <?= htmlentities( $tabla->getNombre() ) ?></a>
    </td>
    <td>
      <?= htmlentities( $tabla->getNum_ejercicios() ) ?></a>
    </td>
    <td>
      <?= htmlentities( $tabla->getTipo() ) ?></a>
    </td>
    <td>
      <?= htmlentities( $tabla->getDificultad() ) ?></a>
    </td>
    

  </tr>
</table>
