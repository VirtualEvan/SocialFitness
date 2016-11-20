<?php
 //file: view/posts/index.php

 require_once(__DIR__."/../../core/ViewManager.php");
 $view = ViewManager::getInstance();

 $tabla = $view->getVariable("tabla");


 $view->setVariable("title", i18n("ver tabla"));

?>

<div class="col-md-12">

  <h1><?=i18n("Ver tabla")?></h1>

  <table class="table table-striped table-condensed">
    <tr class="info">
        <th><?= i18n("Name")?></th>
        <th><?= i18n("Numero Ejercicios")?></th>
        <th><?= i18n("Tipo")?></th>
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
