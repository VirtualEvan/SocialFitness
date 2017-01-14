<?php
require_once(__DIR__."/../core/ViewManager.php");
require_once(__DIR__."/../core/I18n.php");
require_once(__DIR__."/../model/Reservation.php");
require_once(__DIR__."/../model/ReservationMapper.php");
require_once(__DIR__."/../model/User.php");
require_once(__DIR__."/../model/UserMapper.php");
require_once(__DIR__."/../controller/BaseController.php");
/**
 * Class ExerciseController
 */
class ReservationsController extends BaseController {
  /**
   * Reference to the UserMapper to interact
   * with the database
   *
   * @var UserMapper
   */
  private $actividadMapper;
  public function __construct() {
    parent::__construct();
    $this->reservationMapper = new ReservationMapper();
    $this->userMapper = new UserMapper();
    // Users controller operates in a "welcome" layout
    // different to the "default" layout where the internal
    // menu is displayed
    //$this->view->setLayout("default");
  }

 /**
   * Action to add actividad
   * @return void
   */
  public function add() {
    if (!isset($_GET["id"])) {
      throw new Exception("ID is mandatory");
    }
    $activityid = $_GET["id"];
    $reservation = new Reservation();

    if ( isset($_POST["horario"]) && isset($_POST["num_plazas"]) ){ // reaching via HTTP Post...
      // populate the User object with data form the form
   //die($_POST['entrenador']);
      $reservation->setHorario($_POST["horario"]);
      $reservation->setNum_plazas($_POST["num_plazas"]);
      $reservation->setActividad($activityid);

      try{

          $reservation->checkIsValidForAdd();

         $this->reservationMapper->add($reservation);
    	   $this->view->setFlash( i18n("Reservation successfully added") );

         $this->view->redirect( "actividades", "view&id=".$activityid );

      }catch(ValidationException $ac) {
      	// Get the errors array inside the exepction...
      	$errors = $ac->getErrors();
      	// And put it to the view as "errors" variable
      	$this->view->setVariable("errors", $errors);
      }
    }
    $this->view->setVariable("activityid", $activityid);

    // render the view (/view/users/register.php)
    $this->view->render("reservations", "add");
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
    if (!isset($_REQUEST["activity"])) {
     throw new Exception("A activity id is mandatory");
    }
    $activity = $_GET['activity'];
    //if (!isset($this->currentUser)) {
      //throw new Exception("Not in session. Managing actions requires login");
    //}
     // Get the User object from the database
    $reservationid = $_GET["id"];
    $reservation = $this->reservationMapper->findById($reservationid);

    // TODO:Check if the User author is the currentUser (in Session)
    //if ($this->currentUser->getType() != "admin") {
    //  throw new Exception("The logged user is not an admin");
    //}
    // Does the user exist?
    if ($reservation == NULL) {
      throw new Exception( i18n("There is no reservation with that id"));
    }
    // Delete the User object from the database
    $this->reservationMapper->delete($reservation);
    // POST-REDIRECT-GET
    // Everything OK, we will redirect the user to the list of posts
    // We want to see a message after redirection, so we establish
    // a "flash" message (which is simply a Session variable) to be
    // get in the view after redirection.
    $this->view->setFlash( i18n("Reservation successfully deleted") );
    // perform the redirection. More or less:
    // header("Location: index.php?controller=posts&action=index")
    // die();
    $this->view->redirect("actividades", "view&id=".$activity);
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
      throw new Exception("A reservation id is mandatory");
    }
    if (!isset($_REQUEST["activity"])) {
     throw new Exception("A activity id is mandatory");
    }
    $activity = $_GET['activity'];


    if (!isset($this->currentUser)) {
      throw new Exception("Not in session. Managing actions requires login");
    }

    // Get the User object from the database
    $reservationid = $_REQUEST["id"];
    $reservation = $this->reservationMapper->findById($reservationid);
    // Does the user exist?
    if ($reservation == NULL) {
      throw new Exception(i18n("There is no reservation with that id"));
    }
    if (isset($_POST["submit"])) {
      // populate the Exercise object with data form the form
      $reservation->setHorario($_POST["horario"]);
      $reservation->setNum_plazas($_POST["num_plazas"]);
      try {
        $reservation->checkIsValidForUpdate();

        $this->reservationMapper->update($reservation);

        $this->view->setFlash( i18n( "Reservation suscessfully updated") );
        // perform the redirection. More or less:
        // header("Location: index.php?controller=posts&action=index")
        // die();
        $this->view->redirect("actividades", "view&id=".$activity);
      }catch(ValidationException $ex) {
        // Get the errors array inside the exepction...
        $errors = $ex->getErrors();
        // And put it to the view as "errors" variable
        $this->view->setVariable("errors", $errors);
      }
    }
    $this->view->setVariable("activity", $activity);

    // Put the User object visible to the view
    $this->view->setVariable("reservation", $reservation);
    // render the view (/view/users/edit.php)
    $this->view->render("reservations", "edit");
  }


  /**
    * Action to add actividad
    * @return void
    */
   public function apply() {
     if (!isset($_GET['id'])) {
       throw new Exception("An id is required");
     }
     if (!isset($_REQUEST["activity"])) {
      throw new Exception("A activity id is mandatory");
     }
     $activity = $_GET['activity'];

     $reservation = $this->reservationMapper->findById($_GET['id']);
     if ($reservation == NULL) {
       throw new Exception(i18n("There is no reservation with that id"));
     }

     try{
     	 $this->reservationMapper->alreadyInscribed($_GET['id'], $this->currentUser->getId());
       $this->reservationMapper->checkCapacity($_GET['id']);
       $this->reservationMapper->inscribe($_GET['id'], $this->currentUser->getId());

   	   $this->view->setFlash( i18n( "Successfully inscribed" ) );

       $this->view->redirect( "actividades", "view&id=".$activity );

     }catch(ValidationException $ac) {
      // Get the errors array inside the exepction...
      $errors = $ac->getErrors();
      // And put it to the view as "errors" variable
      $this->view->setVariable("errors", $errors);
     }

     // render the view (/view/users/register.php)
     $this->view->redirect("actividades", "view&id=".$activity);
   }

   public function leave() {
     if (!isset($_GET["id"])) {
       throw new Exception("ID is mandatory");
     }

     if (!isset($_GET["user"])) {
       throw new Exception("User is mandatory");
     }

     if (!isset($_REQUEST["activity"])) {
      throw new Exception("A activity id is mandatory");
     }
     $activity = $_GET['activity'];

     $reservationid = $_GET["id"];
     $userid = $_GET["user"];
     $reservation = $this->reservationMapper->findById($reservationid);

     if ($reservation == NULL) {
       throw new Exception(i18n("There is no reservation with that id"));
     }
     // Delete the User object from the database
     $this->reservationMapper->leave($reservationid, $userid);

     $this->view->setFlash( i18n( "Reservation successfully cancelled" ) );
     // perform the redirection. More or less:
     // header("Location: index.php?controller=posts&action=index")
     // die();
     $this->view->redirect("actividades", "view&id=".$activity);
   }
}