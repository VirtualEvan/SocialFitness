<?php
 //file: view/users/register.php

 require_once(__DIR__."/../../core/ViewManager.php");
 $view = ViewManager::getInstance();
 $errors = $view->getVariable("errors");
 $user = $view->getVariable("user");
 $view->setVariable("title", "Add user");
?>
<div class="col-md-12">
  <h1><?= i18n("Edit user")?></h1>
  <form action="index.php?controller=users&amp;action=selfedit&amp;id=<?= $user->getId() ?>" method="POST">
    <div class="form-group">
      <label><?= i18n("Full name")?>:</label>
      <input type="text" class="form-control" name="name"	value="<?= $user->getName() ?>" >
      <?= isset($errors["name"])?$errors["name"]:"" ?>
    </div>

    <div class="form-group">
      <label><?= i18n("eMail")?>:</label>
      <input type="text" class="form-control" name="email" value="<?= $user->getEmail() ?>">
      <?= isset($errors["email"])?$errors["email"]:"" ?>
    </div>

    <div class="form-group">
      <label><?= i18n("Password")?>:</label>
      <input type="password" class="form-control" name="password">
      <?= isset($errors["password"])?$errors["password"]:"" ?>
    </div>

    <div class="form-group">
      <label><?= i18n("Phone")?>:</label>
      <input type="text" class="form-control" name="phone" value="<?= $user->getPhone() ?>">
      <?= isset($errors["phone"])?$errors["phone"]:"" ?>
    </div>
    <input type="submit" class="btn btn-warning" name="submit"  value= <?= i18n("Edit")?> >
  </form>
</div>
