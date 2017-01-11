<?php
//file: view/posts/index.php

  require_once(__DIR__."/../../core/ViewManager.php");
  $view = ViewManager::getInstance();

  $maquinas = $view->getVariable("maquinas");
  $currentusertype = $view->getVariable("currentusertype");

  $view->setVariable("title", i18n("Machines"));
?>
<div class="col-md-12">
<h1><?=i18n("Machine management")?></h1>

<div class="form-group">
  <?php
    if( $currentusertype == "admin"): ?>
      <p><a href="index.php?controller=maquinas&amp;action=add" class="btn btn-info"><?= i18n("Add machine") ?></a></p>
  <?php
    endif
  ?>
</div>
<?php //endif; ?>
<table class="table table-striped table-condensed">
<tr class="info">

    <th><?= i18n("Name")?></th>
    <th><?= i18n("Location")?></th>
    <?php
      if( $currentusertype == "admin"): ?>
        <th><?= i18n("Options")?></th>
    <?php
      endif
    ?>

</tr>
  <?php foreach ($maquinas as $maquina): ?>
  <tr>
    <td>
      <a href="index.php?controller=maquinas&amp;action=view&amp;id=<?= $maquina->getId() ?>"><?= htmlentities( $maquina->getName() ) ?></a>
    </td>
    <td>
      <a href="index.php?controller=maquinas&amp;action=view&amp;id=<?= $maquina->getId() ?>"><?= htmlentities( $maquina->getUbicacion() ) ?></a>
    </td>
      <?php
        if( $currentusertype == "admin"): ?>
          <td>
            <a href="index.php?controller=maquinas&amp;action=delete&amp;id=<?= $maquina->getId() ?>" class="btn btn-danger"><?= i18n("Delete") ?></a>

            <a href="index.php?controller=maquinas&amp;action=edit&amp;id=<?= $maquina->getId() ?>" class="btn btn-warning"><?= i18n("Edit") ?></a>
          </td>
      <?php
        endif
      ?>
  </tr>
<?php endforeach; ?>
</table>

  </table>
</div>
