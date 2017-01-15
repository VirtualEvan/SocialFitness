<?php
 //file: view/posts/index.php

 require_once(__DIR__."/../../core/ViewManager.php");
 $view = ViewManager::getInstance();

 $actividad = $view->getVariable("actividad");
 $reservations = $view->getVariable("reservations");
 $currentuserid = $view->getVariable("currentuserid");
 $currentusertype = $view->getVariable("currentusertype");
 $applys = $view->getVariable("applys");
 $view->setVariable("title", i18n("View activity"));

?>
<div class="col-md-6">

  <h1><?=i18n("View Activity")?></h1>

  <table class="table table-striped table-condensed">
    <tr class="info">
        <th><?= i18n("Name")?></th>
        <th><?= i18n("Description")?></th>
        <th><?= i18n("Coach")?></th>
    </tr>

  <tr>
    <td>
      <?= htmlentities( $actividad->getNombre() ) ?></a>
    </td>
    <td>
      <?= htmlentities( $actividad->getDescripcion() ) ?></a>
    </td>
    <td>
      <?= htmlentities( $actividad->getEntrenador()->getName() ) ?></a>
    </td>

  </tr>
</table>
</div>
<div class="col-md-6">


<h1><?=i18n("Reservations")?>
  <?php
    if( $currentusertype == "admin" || $currentusertype == "coach" ): ?>
      <a href="index.php?controller=reservations&amp;action=add&amp;id=<?=$actividad->getId()?>" class="btn btn-info"><?= i18n("Add reservation") ?></a>
  <?php
    endif
  ?>
</h1>
<table class="table table-striped table-condensed">
  <tr class="info">
    <th><?= i18n("Schedule")?></th>
    <th><?= i18n("Seating Capacity")?></th>
    <th><?= i18n("Application")?></th>
    <?php
      if( $currentusertype == "admin" || $currentusertype == "coach"): ?>
        <th><?= i18n("Management options")?></th>
    <?php
      endif;
    ?>
  </tr>

  <?php
    foreach ($reservations as $reservation):
  ?>
    <tr>
      <td>
        <?= htmlentities( $reservation->getHorario() ) ?>
      </td>
      <td>
        <?= htmlentities( $reservation->getNum_plazas() ) ?>
      </td>
      <td>
        <?php
          if(!in_array( $currentuserid, $applys[$reservation->getId()] ) ): ?>
              <a href="index.php?controller=reservations&amp;action=apply&amp;activity=<?=$actividad->getId()?>&amp;id=<?= $reservation->getId() ?>" class="btn btn-success"><?= i18n("Apply") ?></a>        <?php
          endif
        ?>

        <?php
          if( ($currentuserid == $actividad->getEntrenador()->getId()) || (in_array( $currentuserid, $applys[$reservation->getId()] ) ) ): ?>
              <a href="index.php?controller=reservations&amp;action=leave&amp;activity=<?=$actividad->getId()?>&amp;id=<?= $reservation->getId() ?>&amp;user=<?= $currentuserid ?>" class="btn btn-danger"><?= i18n("Cancel") ?></a>
        <?php
          endif
        ?>
      </td>
      <?php
        if( $currentusertype == "admin" || $currentusertype == "coach"): ?>
          <td>
            <a href="index.php?controller=reservations&amp;action=delete&amp;activity=<?=$actividad->getId()?>&amp;id=<?= $reservation->getId() ?>" class="btn btn-danger"><?= i18n("Delete") ?></a>
            <a href="index.php?controller=reservations&amp;action=edit&amp;activity=<?=$actividad->getId()?>&amp;id=<?= $reservation->getId() ?>" class="btn btn-warning"><?= i18n("Edit") ?></a>
          </td>
      <?php
        endif
      ?>
    </tr>
  <?php
    endforeach;
  ?>
</table>
