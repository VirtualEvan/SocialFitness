<?php
 //file: view/layouts/default.php

 require_once(__DIR__."/../../core/ViewManager.php");
 $view = ViewManager::getInstance();
 $currentuser = $view->getVariable("currentusername");

?><!DOCTYPE html>
<html>
  <head>
    <title><?= $view->getVariable("title", "no title") ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="public/css/style.css" type="text/css">
    <link rel="stylesheet" href="public/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="public/css/style.min.css" type="text/css">
    <link rel="stylesheet" href="public/css/bootstrap-multiselect.min.css" type="text/css">
    <?= $view->getFragment("css") ?>
    <?= $view->getFragment("javascript") ?>
  </head>
  <body>
    <?php
      $class = $_GET['controller']=="users"?  "class=active": '';
     ?>
    <!-- header -->
    <header>
      <h1>SocialFitness</h1>
      <nav id="menu" style="background-color:grey">
	<ul class="nav nav-tabs">
	<li class=<?php if ($_GET['controller']=="users") {echo "active"; } else {echo "noactive";}?>> <a href="index.php?controller=users&amp;action=index"><?= i18n("Users") ?></a></li>
  <li class=<?php if ($_GET['controller']=="exercises") {echo "active"; } else {echo "noactive";}?>> <a href="index.php?controller=exercises&amp;action=index"><?= i18n("Exercises") ?></a></li>
  <li class=<?php if ($_GET['controller']=="something") {echo "active"; } else {echo "noactive";}?>> <a href="index.php?controller=users&amp;action=logout">Logout</a></li>

	<?php //TODO: ARREGLAR ESTA PUTA MIERDA
   if (isset($currentuser)): ?>
	  <li><?= sprintf(i18n("Hello %s"), $currentuser) ?>
	  <a 	href="index.php?controller=users&amp;action=logout">(Logout)</a>
	  </li>

	<?php else: ?>
	  <li><a href="index.php?controller=users&amp;action=login"><?= i18n("Login") ?></a></li>
	  <?php endif ?>
	</ul>
      </nav>
    </header>

    <main>
      <div id="flash">
	<?= $view->popFlash() ?>
      </div>

      <?= $view->getFragment(ViewManager::DEFAULT_FRAGMENT) ?>
    </main>

    <footer>
      <?php
      include(__DIR__."/language_select_element.php");
      ?>
    </footer>

  </body>
</html>