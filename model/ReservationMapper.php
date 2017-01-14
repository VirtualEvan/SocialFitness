<?php
// file: model/UserMapper.php
require_once(__DIR__."/../core/PDOConnection.php");
require_once(__DIR__."/../model/User.php");
/**
 * Class UserMapper
 *
 * Database interface for User entities
 *
 * @author lipido <lipido@gmail.com>
 */
class ReservationMapper {
  /**
   * Reference to the PDO connection
   * @var PDO
   */
  private $db;
  public function __construct() {
    $this->db = PDOConnection::getInstance();
  }
  /**
   * Saves a User into the database
   *TODO: this
   * @param User $user The user to be saved
   * @throws PDOException if a database error occurs
   * @return void
   */
  public function add($reservation) {
    $stmt = $this->db->prepare( "INSERT INTO reserva ( horario, num_plazas, actividad) values (?,?,?)" );
   $stmt->execute(array($reservation->getHorario(), $reservation->getNum_plazas(), $reservation->getActividad() ) );

  }
  /**
   * Deletes a User into the database
   *TODO:this
   * @param User $user The user to be deleted
   * @throws PDOException if a database error occurs
   * @return void
   */
  public function delete(Reservation $reservation) {
    $stmt = $this->db->prepare("DELETE from reserva WHERE id_reserva=?");
    $stmt->execute(array($reservation->getId()));
  }
  /**
   * Updates a User in the database
   *TODO:this
   * @param User $user The user to be updated
   * @throws PDOException if a database error occurs
   * @return void
   */
  public function update(Reservation $reservation) {
    $stmt = $this->db->prepare("UPDATE reserva SET horario=?, num_plazas=? WHERE id_reserva=?");
    $stmt->execute( array( $reservation->getHorario(), $reservation->getNum_plazas(), $reservation->getId() ) );
  }
  /**
   * Loads a User from the database given its id
   * @throws PDOException if a database error occurs
   * @return User The User instances
   * NULL if the User is not found
   * TODO: this
   */
  public function findById($reservationid){
    $stmt = $this->db->prepare("SELECT * FROM reserva  WHERE id_reserva=?");
    $stmt->execute(array($reservationid));
    $reservation = $stmt->fetch(PDO::FETCH_ASSOC);

    if($reservation != null) {
      return new Reservation( $reservation["id_reserva"], $reservation["horario"], $reservation["num_plazas"], $reservation["actividad"] );
    } else {
      return NULL;
    }
  }

  /**
   * Retrieves all users
   * @throws PDOException if a database error occurs
   * @return mixed Array of Users instances
   */
  public function findAll() {
    $stmt = $this->db->query( "SELECT * FROM actividad LEFT JOIN usuario ON id_usuario=entrenador" );
    $actividades_db = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $actividades = array();

    foreach ($actividades_db as $actividad) {
        $entrenador = new User( $actividad['id_usuario'],NULL,NULL, $actividad['nombre_usuario'] );
      array_push( $actividades, new Actividad( $actividad["id_actividad"], $actividad["nombre"], $actividad["horario"], $actividad['descripcion'], $actividad["num_plazas"], $entrenador ) );
    }

    return $actividades;
  }
  /**
   * Checks if a given username is already in the database
   *TODO:here
   * @param string $username the username to check
   * @return boolean true if the username exists, false otherwise
   */
  public function nameExists($nombre) {
    $stmt = $this->db->prepare( "SELECT count(nombre) FROM actividad where nombre=?" );
    $stmt->execute(array($nombre));
    if ($stmt->fetchColumn() > 0) {
      return true;
    }
  }

  public function alreadyInscribed($reservationid, $userid) {
    $stmt = $this->db->prepare( "SELECT count(id_usuario) FROM reserva_usuario WHERE id_usuario=? AND id_reserva=?" );
    $stmt->execute(array($userid,$reservationid));
    $errors = array();
    if ($stmt->fetchColumn() > 0) {
      $errors["activity"] = "User already inscribed";
      throw new ValidationException($errors, "User already inscribed");
    }
  }

  public function checkCapacity($reservationid) {
    $stmt = $this->db->prepare( "SELECT count(id_reserva) FROM reserva_usuario WHERE id_reserva=?" );
    $stmt->execute(array($reservationid));
    $inscribed = $stmt->fetch(PDO::FETCH_ASSOC);

    $stmt = $this->db->prepare( "SELECT num_plazas FROM reserva WHERE id_reserva=?" );
    $stmt->execute(array($reservationid));
    $capacity = $stmt->fetch(PDO::FETCH_ASSOC);

    $errors = array();
    if ($capacity["num_plazas"] <= $inscribed["count(id_reserva)"]) {
      $errors["activity"] = "This activity is full";
      throw new ValidationException($errors, "This activity is full");
    }
  }

  public function inscribe($reservationid,$userid) {
    $stmt = $this->db->prepare( "INSERT INTO reserva_usuario (id_usuario, id_reserva) VALUES (?,?)" );
    $stmt->execute( array( $userid, $reservationid ) );
  }

  public function findByActivityId($actividadid) {
    $stmt = $this->db->prepare("SELECT * FROM reserva WHERE actividad=?");
    $stmt->execute(array($actividadid));
    $reservations_db = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $reservations = array();

    foreach ($reservations_db as $reservation) {
        array_push( $reservations, new Reservation( $reservation["id_reserva"], $reservation["horario"], $reservation["num_plazas"], $reservation["actividad"] ) );
    }

    return $reservations;
  }

  public function findUsersByApplyId($applyid) {
    $stmt = $this->db->prepare("SELECT id_usuario FROM reserva_usuario WHERE id_reserva=?");
    $stmt->execute(array($applyid));
    $users = $stmt->fetchAll(PDO::FETCH_COLUMN);

    return $users;
  }

  public function leave($reservationid,$userid) {
    $stmt = $this->db->prepare("DELETE from reserva_usuario WHERE id_reserva=? AND id_usuario=?");
    $stmt->execute(array($reservationid,$userid));
  }

}