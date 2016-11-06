<?php
 //file: view/posts/index.php

 require_once(__DIR__."/../../core/ViewManager.php");
 $view = ViewManager::getInstance();

 $exercises = $view->getVariable("exercises");
 $currentuser = $view->getVariable("currentusername");

 $view->setVariable("title", "Exercises");
?>

<div class="col-md-12">
  <h1><?=i18n("Exercises")?></h1>
  <?php //if (isset($currentuser)): ?>
  <p><a href="index.php?controller=exercises&amp;action=add" class="btn btn-info"><?= i18n("Add exercise") ?></a></p>
  <?php //endif; ?>
  <table class="table table-striped table-condensed">
      <tr class="info">
        <th><?= i18n("Name")?></th>
        <th><?= i18n("Type")?></th>
        <th><?= i18n("Difficulty")?></th>
        <th><?= i18n("Management options")?></th>
      </tr>

      <?php foreach ($exercises as $exercise): ?>
      <tr>
        <td>
          <a href="index.php?controller=exercises&amp;action=view&amp;id=<?= $exercise->getId() ?>"><?= htmlentities( $exercise->getName() ) ?></a>
        </td>
        <td>
          <a href="index.php?controller=exercises&amp;action=view&amp;id=<?= $exercise->getId() ?>"><?= htmlentities( $exercise->getType() ) ?></a>
        </td>
        <td>
          <a href="index.php?controller=exercises&amp;action=view&amp;id=<?= $exercise->getId() ?>"><?= htmlentities( $exercise->getDifficulty() ) ?></a>
        </td>
        <td>
          <a href="index.php?controller=exercises&amp;action=delete&amp;id=<?= $exercise->getId() ?>" class="btn btn-danger"><?= i18n("Delete") ?></a>
          <a href="index.php?controller=exercises&amp;action=edit&amp;id=<?= $exercise->getId() ?>" class="btn btn-warning"><?= i18n("Edit") ?></a>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>
</div>

