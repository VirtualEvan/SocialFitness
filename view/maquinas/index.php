<?php
//file: view/posts/index.php

  require_once(__DIR__."/../../core/ViewManager.php");
  $view = ViewManager::getInstance();

  $maquinas = $view->getVariable("maquinas");
  $currentmaquina = $view->getVariable("currentmaquinaname");

  $view->setVariable("title", i18n("Maquinas"));
?>

<h1><?=i18n("Gestion Maquinas")?></h1>

<table border="1">
  <tr>
    <th><?= i18n("Name")?></th>
    <th><?= i18n("Ubicacion")?></th>
  </tr>

  <?php foreach ($maquinas as $maquina): ?>
  <tr>
    <td>
      <a href="index.php?controller=maquinas&amp;action=view&amp;id=<?= $maquina->getId() ?>"><?= htmlentities( $maquina->getName() ) ?></a>
    </td>
    <td>
      <a href="index.php?controller=maquinas&amp;action=view&amp;id=<?= $maquina->getId() ?>"><?= htmlentities( $maquina->getUbicacion() ) ?></a>
    </td>
    <td>
      <a href="index.php?controller=maquinas&amp;action=delete&amp;id=<?= $maquina->getId() ?>"><?= i18n("Delete") ?></a>
    </td>
    <td>
      <a href="index.php?controller=maquinas&amp;action=edit&amp;id=<?= $maquina->getId() ?>"><?= i18n("Edit") ?></a>
    </td>
  </tr>
<?php endforeach; ?>
</table>

<?php //if (isset($currentmaquina)): ?>

  <a href="index.php?controller=maquinas&amp;action=add"><?= i18n("Add maquina") ?></a>
  <a href="index.php?controller=maquinas&amp;action=edit"><?= i18n("Edit") ?></a>
<?php //endif; ?>
