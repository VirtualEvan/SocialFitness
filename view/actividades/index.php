<?php
 //file: view/posts/index.php

 require_once(__DIR__."/../../core/ViewManager.php");
 $view = ViewManager::getInstance();

 $actividades = $view->getVariable("actividad");
 $currentusertype = $view->getVariable("currentusertype");


 $view->setVariable("title", i18n("Activity  management"));

?>
<h1><?=i18n("Activities")?></h1>

<table border="1">
      <tr>
        <tr>
          <th><?= i18n("Full name")?></th>
          <th><?= i18n("Schedule")?></th>
          <th><?= i18n("Description")?></th>
          <th><?= i18n("Capacity")?></th>
          <th><?= i18n("Coach")?></th>
          <?php
            if( $currentusertype == "admin"): ?>
              <th><?= i18n("Management options")?></th>
          <?php
            endif
          ?>
        </tr>
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
              <a href="index.php?controller=actividades&amp;action=delete&amp;id=<?= $actividad->getId() ?>"><?= i18n("Delete") ?></a>

              <a href="index.php?controller=actividades&amp;action=edit&amp;id=<?= $actividad->getId() ?>"><?= i18n("Edit") ?></a>
            </td>
        <?php
          endif
        ?>
      </tr>
    <?php endforeach; ?>

    </table>
    <?php //if (isset($currentuser)): ?>
      <a href="index.php?controller=actividades&amp;action=add"><?= i18n("Add actividad") ?></a>
    <?php //endif; ?>

