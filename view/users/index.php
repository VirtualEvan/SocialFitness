<?php
//file: view/posts/index.php

  require_once(__DIR__."/../../core/ViewManager.php");
  $view = ViewManager::getInstance();

  $users = $view->getVariable("users");
  $currentuser = $view->getVariable("currentusername");

  $view->setVariable("title", i18n("User management"));
?>

<div class="col-md-12">
  <h1><?=i18n("User management")?></h1>
  <?php //if (isset($currentuser)): ?>
    <p><a href="index.php?controller=users&amp;action=add" class="btn btn-info"><?= i18n("Add user") ?></a></p>
  <?php //endif; ?>
  <table class="table table-striped table-condensed">
    <tr class="info">
      <th><?= i18n("Name")?></th>
      <th><?= i18n("Email")?></th>
      <th><?= i18n("Type")?></th>
      <th><?= i18n("Phone")?></th>
      <th><?= i18n("Password")?></th>
      <th><?= i18n("Management options")?></th>
    </tr>

    <?php foreach ($users as $user): ?>
    <tr>
      <td>
        <a href="index.php?controller=users&amp;action=view&amp;id=<?= $user->getId() ?>"><?= htmlentities( $user->getName() ) ?></a>
      </td>
      <td>
        <a href="index.php?controller=users&amp;action=view&amp;id=<?= $user->getId() ?>"><?= htmlentities( $user->getEmail() ) ?></a>
      </td>
      <td>
        <a href="index.php?controller=users&amp;action=view&amp;id=<?= $user->getId() ?>"><?= htmlentities( $user->getType() ) ?></a>
      </td>
      <td>
        <a href="index.php?controller=users&amp;action=view&amp;id=<?= $user->getId() ?>"><?= htmlentities( $user->getPhone() ) ?></a>
      </td>
      <td>
        <a href="index.php?controller=users&amp;action=view&amp;id=<?= $user->getId() ?>"><?= htmlentities( $user->getPassword() ) ?></a>
      </td>
      <td>
        <a href="index.php?controller=users&amp;action=delete&amp;id=<?= $user->getId() ?>" class="btn btn-danger"><?= i18n("Delete") ?></a>

        <a href="index.php?controller=users&amp;action=edit&amp;id=<?= $user->getId() ?>" class="btn btn-warning"><?= i18n("Edit") ?></a>
      </td>
    </tr>
  <?php endforeach; ?>
  </table>
</div>

