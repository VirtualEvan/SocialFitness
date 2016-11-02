<?php
//file: view/posts/index.php

  require_once(__DIR__."/../../core/ViewManager.php");
  $view = ViewManager::getInstance();

  $users = $view->getVariable("users");
  $currentuser = $view->getVariable("currentusername");

  $view->setVariable("title", i18n("User management"));
?>

<h1><?=i18n("User management")?></h1>

<table border="1">
  <tr>
    <th><?= i18n("Name")?></th>
    <th><?= i18n("Email")?></th>
    <th><?= i18n("Type")?></th>
    <th><?= i18n("Phone")?></th>
    <th><?= i18n("Password")?></th>
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
      <a href="index.php?controller=users&amp;action=delete&amp;id=<?= $user->getId() ?>"><?= i18n("Delete") ?></a>
    </td>
    <td>
      <a href="index.php?controller=users&amp;action=edit&amp;id=<?= $user->getId() ?>"><?= i18n("Edit") ?></a>
    </td>
  </tr>
<?php endforeach; ?>
</table>

<?php //if (isset($currentuser)): ?>
  <a href="index.php?controller=users&amp;action=add"><?= i18n("Add user") ?></a>
<?php //endif; ?>

