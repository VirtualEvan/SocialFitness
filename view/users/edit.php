<?php
 //file: view/users/register.php

 require_once(__DIR__."/../../core/ViewManager.php");
 $view = ViewManager::getInstance();
 $errors = $view->getVariable("errors");
 $user = $view->getVariable("user");
 $tables = $view->getVariable("tables");
 $selected = $view->getVariable("selected");
 $view->setVariable("title", "Edit user");
?>
<div class="col-md-12">
  <h1><?= i18n("Edit user")?></h1>
  <form action="index.php?controller=users&amp;action=edit&amp;id=<?= $user->getId() ?>" method="POST">
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
      <label><?= i18n("Type")?>:</label>
      <select name="type" class="form-control">
        <option value="athlete" selected> <?= i18n("Athlete") ?> </option>
        <option value="coach"> <?= i18n("Coach") ?> </option>
        <option value="admin"> <?= i18n("Administrator") ?> </option>
      </select>
      <?= isset($errors["type"])?$errors["type"]:"" ?>
    </div>

    <div class="form-group">
      <label><?= i18n("Phone")?>:</label>
      <input type="text" class="form-control" name="phone" value="<?= $user->getPhone() ?>">
      <?= isset($errors["phone"])?$errors["phone"]:"" ?>
    </div>

    <div class="form-group">
      <label><?= i18n("Training tables")?>:</label>
      <?php if(count($tables) > 0): ?>
			<select multiple class="form-control" name="tables[]">
				<?php
					foreach($tables as $table){
        ?>
					<option value="<?= $table->getId() ?>" <?php if ( in_array($table->getId(),$selected) ){echo "selected";} ?>>  <?= $table->getNombre() ?> </option>;
        <?php
        	}
				?>
			</select>
    <?php else: ?>
			<div class="alert alert-info">
				<?= i18n("There are no training tables defined")?>
			</div>
			<?php endif; ?>
      <div class="help-block">
        <?= isset($errors["tables"])?$errors["tables"]:"" ?>
      </div>
    </div>

    <input type="submit" class="btn btn-warning" name="submit"  value= <?= i18n("Edit")?> >
  </form>
</div>
