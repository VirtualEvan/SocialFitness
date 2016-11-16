<?php
require_once(__DIR__."/../core/ViewManager.php");
require_once(__DIR__."/../core/I18n.php");
require_once(__DIR__."/../model/Actividad.php");
require_once(__DIR__."/../model/ActividadMapper.php");
require_once(__DIR__."/../controller/BaseController.php");
/**
 * Class ExerciseController
 */
class ActividadController extends BaseController {
  /**
   * Reference to the UserMapper to interact
   * with the database
   *
   * @var UserMapper
   */
  private $actividadMapper;
  public function __construct() {
    parent::__construct();
    $this->actividadMapper = new ActividadMapper();
    // Users controller operates in a "welcome" layout
    // different to the "default" layout where the internal
    // menu is displayed
    //$this->view->setLayout("default");
  }
  /**
  * Action to list exercises
  * @return void
  */
  public function index() {
    // obtain the data from the database
    $actividades = $this->actividadMapper->findAll();
    // put the array containing Post object to the view
    $this->view->setVariable("actividad", $actividades);
    // render the view (/view/posts/index.php)
    $this->view->render("actividades", "index");
  }
 /**
   * Action to add actividad
   * @return void
   */
  public function add() {
    $actividad = new Actividad();

    if ( isset($_POST["nombre"]) && isset($_POST["horario"]) && isset($_POST["descripcion"]) && isset($_POST["num_plazas"]) && isset($_POST["entrenador"])  ){ // reaching via HTTP Post...
      // populate the User object with data form the form
   //die($_POST['entrenador']);
      $actividad->setNombre($_POST["nombre"]);
      $actividad->setHorario($_POST["horario"]);
      $actividad->setDescripcion($_POST["descripcion"]);
      $actividad->setNum_plazas($_POST["num_plazas"]);
      $actividad->setEntrenador($_POST["entrenador"]);

      
      try{
        
      	$actividad->checkIsValidForAdd(); // if it fails, ValidationException
        if (!$this->actividadMapper->nameExists( $_POST["nombre"] ) ){
           $this->actividadMapper->add($actividad);
      	   $this->view->setFlash( "Actividad " . $actividad->getNombre() . " añadida correctamente" );
      	  // POST-REDIRECT-GET
      	  // Everything OK, we will redirect the user to the list of posts
      	  // We want to see a message after redirection, so we establish
      	  // a "flash" message (which is simply a Session variable) to be
      	  // get in the view after redirection.
      	  
      	  // perform the redirection. More or less:
      	  // header("Location: index.php?controller=users&action=login")
      	  // die();
      	  //$this->view->redirect( "actividades", "index" );
          } else {
            $errors = array();
            $errors["nombre"] = "Ya existe una actividad con ese nombre";
            $this->view->setVariable("errors", $errors);
          }
      }catch(ValidationException $ac) {
      	// Get the errors array inside the exepction...
      	$errors = $ac->getErrors();
      	// And put it to the view as "errors" variable
      	$this->view->setVariable("errors", $errors);
      }
    }
    // Put the User object visible to the view
    $this->view->setVariable("actividad", $actividad);
    // render the view (/view/users/register.php)
    $this->view->render("actividades", "add");
  }
  /**
   * Action to delete a user
   * @throws Exception if no id was provided
   * @throws Exception if no user is in session
   * @throws Exception if there is not any user with the provided id
   * @throws Exception if the current logged user is not an admin
   * @return void
   */
  public function delete() {
    if (!isset($_GET["id"])) {
      throw new Exception("ID is mandatory");
    }
    //if (!isset($this->currentUser)) {
      //throw new Exception("Not in session. Managing actions requires login");
    //}
     // Get the User object from the database
    $actividadid = $_GET["id"];
    $actividad = $this->actividadMapper->findById($actividadid);

    // TODO:Check if the User author is the currentUser (in Session)
    //if ($this->currentUser->getType() != "admin") {
    //  throw new Exception("The logged user is not an admin");
    //}
    // Does the user exist?
    if ($actividad == NULL) {
      throw new Exception("No hay actividad con ese id: ".$actividadid);
    }
    // Delete the User object from the database
    $this->actividadMapper->delete($actividad);
    // POST-REDIRECT-GET
    // Everything OK, we will redirect the user to the list of posts
    // We want to see a message after redirection, so we establish
    // a "flash" message (which is simply a Session variable) to be
    // get in the view after redirection.
    $this->view->setFlash( sprintf( i18n("Actividad \"%s\" borrada correctamente"),$actividad->getNombre() ) );
    // perform the redirection. More or less:
    // header("Location: index.php?controller=posts&action=index")
    // die();
    $this->view->redirect("actividad", "index");
  }
  /**
   * Action to edit a user
   *
   * @throws Exception if no id was provided
   * @throws Exception if no user is in session
   * @throws Exception if there is not any user with the provided id
   * @throws Exception if the current logged user is not an admin
   * @return void
   */
  public function edit() {
    
     if (!isset($_REQUEST["id"])) {
      throw new Exception("A actividad id is mandatory");
    }

    /*if (!isset($this->currentUser)) {
      throw new Exception("Not in session. Managing actions requires login");
    }*/
    // TODO:Check if the current user is admin
    //if ($post->getAuthor() != $this->currentUser) {
    //  throw new Exception("logged user is not the author of the post id ".$postid);
    //}
    // Get the User object from the database
    $actividadid = $_REQUEST["id"];
    $actividad = $this->actividadMapper->findById($actividadid);
  
    // Does the user exist?
    if ($actividad == NULL) {
      throw new Exception("no such actividad with id: ".$actividadid);
    }
    if (isset($_POST["submit"])) { // reaching via HTTP Post...
      // populate the Exercise object with data form the form
      $actividad->setNombre($_POST["nombre"]);
      $actividad->setHorario($_POST["horario"]);
      $actividad->setDescripcion($_POST["descripcion"]);
      $actividad->setNum_plazas($_POST["num_plazas"]);
      $actividad->setEntrenador($_POST["entrenador"]);

      try {
        // validate Post object
        $actividad->checkIsValidForUpdate(); // if it fails, ValidationException
        // update the Post object in the database
        $this->actividadMapper->update($actividad);
        // POST-REDIRECT-GET
        // Everything OK, we will redirect the user to the list of posts
        // We want to see a message after redirection, so we establish
        // a "flash" message (which is simply a Session variable) to be
        // get in the view after redirection.
        $this->view->setFlash( sprintf( i18n( "Actividad \"%s\" actualizada"),$actividad->getName() ) );
        // perform the redirection. More or less:
        // header("Location: index.php?controller=posts&action=index")
        // die();
        $this->view->redirect("actividades", "index");
      }catch(ValidationException $ex) {
        // Get the errors array inside the exepction...
        $errors = $ex->getErrors();
        // And put it to the view as "errors" variable
        $this->view->setVariable("errors", $errors);
      }
    }
    // Put the User object visible to the view
    $this->view->setVariable("actividad", $actividad);
    // render the view (/view/users/edit.php)
    $this->view->render("actividades", "edit");
  }
  /**
   * Action to view a given user
   * @throws Exception If no such user of the given id is found
   * @return void
   *
   */
  public function view(){
    if (!isset($_GET["id"])) {
      throw new Exception("ID is mandatory");
    }
    $actividadid = $_GET["id"];
    // find the Post object in the database
    $actividad = $this->actividadMapper->findById($actividadid);
    if ($actividad == NULL) {
      throw new Exception("No such activity with id: ".$actividadid);
    }
    // put the Post object to the view
    $this->view->setVariable("actividad", $actividad);
    // render the view (/view/posts/view.php)
    $this->view->render("actividad", "view");
  }
}