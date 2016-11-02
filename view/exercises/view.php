<?php
 //file: view/posts/index.php

 require_once(__DIR__."/../../core/ViewManager.php");
 $view = ViewManager::getInstance();

 $exercise = $view->getVariable("exercise");
 $currentuser = $view->getVariable("currentusername");

 $view->setVariable("title", i18n("View user"));

?><h1><?=i18n("Main page")?></h1>

<table border="1">
  <tr>
    <tr>
      <th><?= i18n("Name")?></th>
      <th><?= i18n("Type")?></th>
      <th><?= i18n("Difficulty")?></th>
    </tr>
  </tr>

  <tr>
    <td>
      <?= htmlentities( $exercise->getName() ) ?></a>
    </td>
    <td>
      <?= htmlentities( $exercise->getType() ) ?></a>
    </td>
    <td>
      <?= htmlentities( $exercise->getDifficulty() ) ?></a>
    </td>
  </tr>
</table>
<br>
<h3><?= i18n("Details")?></h3>
<?=$exercise->getDetails();?>




