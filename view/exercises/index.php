<?php
 //file: view/posts/index.php

 require_once(__DIR__."/../../core/ViewManager.php");
 $view = ViewManager::getInstance();

 $exercises = $view->getVariable("exercises");
 $currentuser = $view->getVariable("currentusername");

 $view->setVariable("title", "Exercises");

?><h1><?=i18n("Exercises")?></h1>

<table border="1">
      <tr>
        <tr>
          <th><?= i18n("Name")?></th>
          <th><?= i18n("Type")?></th>
          <th><?= i18n("Difficulty")?></th>
        </tr>
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
          <a href="index.php?controller=exercises&amp;action=delete&amp;id=<?= $exercise->getId() ?>"><?= i18n("Delete") ?></a>
        </td>
        <td>
          <a href="index.php?controller=exercises&amp;action=edit&amp;id=<?= $exercise->getId() ?>"><?= i18n("Edit") ?></a>
        </td>
      </tr>
    <?php endforeach; ?>

    </table>
    <?php //if (isset($currentuser)): ?>
      <a href="index.php?controller=exercises&amp;action=add"><?= i18n("Add exercise") ?></a>
    <?php //endif; ?>

