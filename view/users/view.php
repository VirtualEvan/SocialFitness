<?php
 //file: view/posts/index.php

 require_once(__DIR__."/../../core/ViewManager.php");
 $view = ViewManager::getInstance();

 $user = $view->getVariable("user");
 $currentuser = $view->getVariable("currentusername");
 ?>
 <div class="col-md-12">
  <?php
    $view->setVariable("title", i18n("View user"));
  ?>
  <h1><?=i18n("Main page")?></h1>
  <table class="table table-striped table-condensed">
    <tr class="info">
      <th><?= i18n("Name")?></th>
      <th><?= i18n("Email")?></th>
      <th><?= i18n("Type")?></th>
      <th><?= i18n("Phone")?></th>
      <th><?= i18n("Password")?></th>
    </tr>

    <tr>
      <td>
        <?= htmlentities( $user->getName() ) ?></a>
      </td>
      <td>
        <?= htmlentities( $user->getEmail() ) ?></a>
      </td>
      <td>
        <?= htmlentities( $user->getType() ) ?></a>
      </td>
      <td>
        <?= htmlentities( $user->getPhone() ) ?></a>
      </td>
      <td>
        <?= htmlentities( $user->getPassword() ) ?></a>
      </td>
    </tr>
  </table>
</div>


