<?php
 //file: view/maquinas/register.php
 require_once(__DIR__."/../../core/ViewManager.php");
 $view = ViewManager::getInstance();
 $errors = $view->getVariable("errors");
 $actividad = $view->getVariable("actividad");
 $coaches = $view->getVariable("coaches");
 $view->setVariable("title", "edit");
?>

<div class="col-md-12 button-buffer">
  <h1><?= i18n("Edit activity")?></h1>
  <form action="index.php?controller=actividades&amp;action=edit&amp;id=<?= $actividad->getId() ?>" method="POST">
  <div class="form-group">
      <label><?= i18n("Name")?>:</label>
      <input type="text" class="form-control" name="nombre" value="<?= $actividad->getNombre() ?>">
      <?= isset($errors["nombre"])?$errors["nombre"]:"" ?>
  </div>

  <div class="form-group">
      <label><?= i18n("Description")?>:</label>
      <input type="text" class="form-control" name="descripcion" value="<?= $actividad->getDescripcion() ?>">
      <?= isset($errors["descripcion"])?$errors["descripcion"]:"" ?>
  </div>

  <div class="form-group">
    <label><?= i18n("Coach")?>:</label>
    <select name="coach" class="form-control">
      <?php foreach ($coaches as $coach): ?>
        <option value="<?= $coach->getId() ?>" <?php if($coach->getId()==$actividad->getEntrenador()->getId()){echo "selected";} ?> > <?= $coach->getName() ?> </option>
      <?php endforeach; ?>
    </select>
    <?= isset($errors["coach"])?$errors["coach"]:"" ?>
  </div>


  <input type="submit" class="btn btn-warning" name="submit" value="<?= i18n("Edit")?>">
  </form>

</div>