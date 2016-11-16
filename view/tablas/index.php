<?php
 //file: view/posts/index.php

 require_once(__DIR__."/../../core/ViewManager.php");
 $view = ViewManager::getInstance();

 $tablas = $view->getVariable("tabla");


 $view->setVariable("title", "Tablas");

?>
<h1><?=i18n("Tablas")?></h1>

<table border="1">
      <tr>
        <tr>
          <th><?= i18n("Nombre")?></th>
          <th><?= i18n("Num Ejercicios")?></th>
          <th><?= i18n("Tipo")?></th>
          <th><?= i18n("Duracion")?></th>

        </tr>
      </tr>

      <?php foreach ($tablas as $tabla): ?>
      <tr>
        <td>
          <a href="index.php?controller=tablas&amp;action=view&amp;id=<?= $tabla->getId() ?>"><?= htmlentities( $tabla->getNombre() ) ?></a>
        </td>
        <td>
          <a href="index.php?controller=tablas&amp;action=view&amp;id=<?= $tabla->getId() ?>"><?= htmlentities( $tabla->getNum_ejercicios() ) ?></a>
        </td>
        <td>
          <a href="index.php?controller=tablas&amp;action=view&amp;id=<?= $tabla->getId() ?>"><?= htmlentities( $tabla->getTipo() ) ?></a>
        </td>
         <td>
          <a href="index.php?controller=tablas&amp;action=view&amp;id=<?= $tabla->getId() ?>"><?= htmlentities( $tabla->getDificultad() ) ?></a>
        </td>
        
        <td>
          <a href="index.php?controller=tablas&amp;action=delete&amp;id=<?= $tabla->getId() ?>"><?= i18n("Eliminar") ?></a>
        </td>
         <td>
         <a href="index.php?controller=tablas&amp;action=edit&amp;id=<?= $tabla->getId() ?>"><?= i18n("Edit") ?></a>
    </td>
      </tr>
    <?php endforeach; ?>

    </table>
    <?php //if (isset($currentuser)): ?>
      <a href="index.php?controller=tablas&amp;action=add"><?= i18n("Add tabla") ?></a>
    <?php //endif; ?>

