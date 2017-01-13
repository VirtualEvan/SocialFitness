<?php
 //file: view/users/register.php

 require_once(__DIR__."/../../core/ViewManager.php");
 $view = ViewManager::getInstance();
 $errors = $view->getVariable("errors");
 $users = $view->getVariable("users");
 $activities = $view->getVariable("activities");
 $view->setVariable("title", "Send notification");
?>
<h1><?= i18n("Send notification")?></h1>

<div class="col-md-6">
  <h1><?= i18n("Users")?></h1>
  <form action="index.php?controller=users&amp;action=notify" method="POST">
    <table class="table table-striped table-condensed">
      <tr class="info">
        <th></th>
        <th><?= i18n("Name")?></th>
        <th><?= i18n("Email")?></th>
      </tr>

      <?php foreach ($users as $user): ?>
      <tr>
        <td>
          <input type="checkbox" name="users[]" value="<?= $user->getId() ?>">
        </td>
        <td>
          <a href="index.php?controller=users&amp;action=view&amp;id=<?= $user->getId() ?>"><?= htmlentities( $user->getName() ) ?></a>
        </td>
        <td>
          <a href="index.php?controller=users&amp;action=view&amp;id=<?= $user->getId() ?>"><?= htmlentities( $user->getEmail() ) ?></a>
        </td>
      </tr>
    <?php endforeach; ?>
    </table>
</div>

<div class="col-md-6">
  <h1><?=i18n("Activities")?></h1>
  <?php
  if(isset($errors["activity"])){
  ?>
    <div class="alert alert-danger">
      <?= $errors["activity"] ?>
    </div>
  <?php
  }
  ?>

  <table class="table table-striped table-condensed">
      <tr class="info">
        <th></th>
        <th><?= i18n("Name")?></th>
        <th><?= i18n("Schedule")?></th>
        <th><?= i18n("Seating Capacity")?></th>
        <th><?= i18n("Coach")?></th>
      </tr>
      <?php foreach ($activities as $actividad): ?>
      <tr>
        <td>
          <input type="checkbox" name="activities[]" value="<?= $actividad->getId() ?>">
        </td>
        <td>
          <a href="index.php?controller=actividades&amp;action=view&amp;id=<?= $actividad->getId() ?>"><?= htmlentities( $actividad->getNombre() ) ?></a>
        </td>
        <td>
          <a href="index.php?controller=actividades&amp;action=view&amp;id=<?= $actividad->getId() ?>"><?= htmlentities( $actividad->getHorario() ) ?></a>
        </td>
         <td>
          <a href="index.php?controller=actividades&amp;action=view&amp;id=<?= $actividad->getId() ?>"><?= htmlentities( $actividad->getNum_plazas() ) ?></a>
        </td>
         <td>
           <a href="index.php?controller=actividades&amp;action=view&amp;id=<?= $actividad->getId() ?>"><?= htmlentities( $actividad->getEntrenador()->getName() ) ?></a>
         </td>
      </tr>
    <?php endforeach; ?>
    </table>
</div>

<div class="col-md-12">
  <div class="form-group">
    <label for="comment"><?=i18n('Message')?>:</label>
    <textarea class="form-control" rows="5" id="comment" name="message"></textarea>
  </div>
  <input type="submit" class="btn btn-info" name="submit" value= <?= i18n("Send")?> >
    </form>
</div>