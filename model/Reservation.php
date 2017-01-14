<?php
// file: model/User.php
require_once(__DIR__."/../core/ValidationException.php");
/**
 * Class User
 *
 * Represents a User in the blog
 *
 * @author lipido <lipido@gmail.com>
 */
class Reservation {
  /**
   * The id of this user
   * @var string
   */
  private $id;

  private $horario;

  /**
   * The email of the user
   * @var string
   */
   private $num_plazas;

  private $actividad;

  /**
   * The constructor
   *
   * @param string $username The name of the user
   * @param string $password The password of the user
   */
  public function __construct($id=NULL, $horario=NULL, $num_plazas=NULL, $actividad=NULL) {
    $this->id = $id;
    $this->horario = $horario;
    $this->num_plazas = $num_plazas;
    $this->actividad = $actividad;
  }
  /**
   * Gets the ID of this user
   *
   * @return string The ID of this user
   */
  public function getId() {
    return $this->id;
  }

  public function getHorario() {
    return $this->horario;
  }
  /**
  * Sets the name of this activity
  *
  * @param string $name The name of this activity
  * @return void
  */
  public function setHorario($horario) {
    $this->horario = $horario;
  }

  /**
   * Gets the details of this activity
   *
   * @return string The details of this activity
   */
  public function getNum_plazas() {
    return $this->num_plazas;
  }
  /**
   * Sets the phone of this user
   *
   * @param int $phone The phone of this user
   * @return void
   */
  public function setNum_plazas($num_plazas) {
    $this->num_plazas = $num_plazas;
  }

  public function setActividad($actividadid) {
    $this->actividad = $actividadid;
  }

  public function getActividad() {
    return $this->actividad;
  }

  /**
   * Checks if the current user instance is valid
   * for being registered in the database
   *
   * @throws ValidationException if the instance is
   * not valid
   *
   * @return void
   */
  public function checkIsValidForAdd() {
      $errors = array();
      if (strlen($this->horario) < 3) {
	       $errors["horario"] = "El horario tiene que tener al menos 3 caracteres";
      }

      if ( !is_numeric($this->num_plazas) || strlen($this->num_plazas) < 1 ) {
         $errors["num_plazas"] = "Introduzca un valor numérico, tiene que haber al menos una plaza";
      }

      if (sizeof($errors)>0){
	       throw new ValidationException($errors, "Actividad no valida");
      }
  }

  public function checkIsValidForUpdate() {
    $errors = array();
    if (!isset($this->id)) {
      $errors["ID"] = "ID obligatorio";
    }
    try{
      $this->checkIsValidForAdd();
    }catch(ValidationException $ex) {
      foreach ($ex->getErrors() as $key=>$error) {
	       $errors[$key] = $error;
      }
    }
    if (sizeof($errors) > 0) {
      throw new ValidationException($errors, "Actividad no valida");
    }
  }
}