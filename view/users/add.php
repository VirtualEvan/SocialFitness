<?php
 //file: view/users/register.php

 require_once(__DIR__."/../../core/ViewManager.php");
 $view = ViewManager::getInstance();
 $errors = $view->getVariable("errors");
 $user = $view->getVariable("user");
 $view->setVariable("title", "Add user");
?>
<h1><?= i18n("Add user")?></h1>
<form action="index.php?controller=users&amp;action=add" method="POST">
      <?= i18n("Full name")?>: <input type="text" name="name"	value="<?= $user->getName() ?>">
      <?= isset($errors["name"])?$errors["name"]:"" ?><br>

      <?= i18n("eMail")?>: <input type="text" name="email" value="">
      <?= isset($errors["email"])?$errors["email"]:"" ?><br>

      <?= i18n("Password")?>: <input type="password" name="password" value="">
      <?= isset($errors["password"])?$errors["password"]:"" ?><br>

      <?= i18n("Type")?>: <select name="type">
                            <option value="athlete" selected> <?= i18n("Athlete") ?>: </option>
                            <option value="coach"> <?= i18n("Coach") ?> </option>:
                            <option value="admin"> <?= i18n("Administrator") ?>: </option>
                          </select>
      <?= isset($errors["type"])?$errors["type"]:"" ?><br>

      <?= i18n("Phone")?>: <input type="text" name="phone" value="">
      <?= isset($errors["phone"])?$errors["phone"]:"" ?><br>

      <input type="submit" value= <?= i18n("Add")?> >
</form>