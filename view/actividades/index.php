<?php
 //file: view/posts/index.php

 require_once(__DIR__."/../../core/ViewManager.php");
 $view = ViewManager::getInstance();

 $actividades = $view->getVariable("actividad");


 $view->setVariable("title", "Actividades");

?>
<h1><?=i18n("Actividades")?></h1>

<table border="1">
      <tr>
        <tr>
          <th><?= i18n("Nombre")?></th>
          <th><?= i18n("Horario")?></th>
          <th><?= i18n("Descripcion")?></th>
          <th><?= i18n("Num_Plazas")?></th>
          <th><?= i18n("Entrenador")?></th>
        </tr>
      </tr>

      <?php foreach ($actividades as $actividad): ?>
      <tr>
        <td>
          <a href="index.php?controller=actividad&amp;action=view&amp;id=<?= $actividad->getId() ?>"><?= htmlentities( $actividad->getNombre() ) ?></a>
        </td>
        <td>
          <a href="index.php?controller=actividad&amp;action=view&amp;id=<?= $actividad->getId() ?>"><?= htmlentities( $actividad->getHorario() ) ?></a>
        </td>
        <td>
          <a href="index.php?controller=actividad&amp;action=view&amp;id=<?= $actividad->getId() ?>"><?= htmlentities( $actividad->getDescripcion() ) ?></a>
        </td>
         <td>
          <a href="index.php?controller=actividad&amp;action=view&amp;id=<?= $actividad->getId() ?>"><?= htmlentities( $actividad->getNum_plazas() ) ?></a>
        </td>
         <td>
          <a href="index.php?controller=actividad&amp;action=view&amp;id=<?= $actividad->getId() ?>"><?= htmlentities( $actividad->getEntrenador() ) ?></a>
        </td>
        <td>
          <a href="index.php?controller=actividad&amp;action=delete&amp;id=<?= $actividad->getId() ?>"><?= i18n("Eliminar") ?></a>
        </td>
         <td>
         <a href="index.php?controller=actividad&amp;action=edit&amp;id=<?= $actividad->getId() ?>"><?= i18n("Edit") ?></a>
    </td>
      </tr>
    <?php endforeach; ?>

    </table>
    <?php //if (isset($currentuser)): ?>
      <a href="index.php?controller=actividad&amp;action=add"><?= i18n("Add actividad") ?></a>
    <?php //endif; ?>

