<?php
// file: model/UserMapper.php
require_once(__DIR__."/../core/PDOConnection.php");
/**
 * Class UserMapper
 *
 * Database interface for User entities
 *
 * @author lipido <lipido@gmail.com>
 */
class ActividadMapper {
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
  public function add($actividad) {
    $stmt = $this->db->prepare( "INSERT INTO actividad (id_actividad, nombre, horario, descripcion, num_plazas, entrenador) values (?,?,?,?,?,?)" );
   $stmt->execute(array($actividad->getID(), $actividad->getNombre(),$actividad->getHorario(), $actividad->getDescripcion(), $actividad->getNum_plazas(), $actividad->getEntrenador() ) );

  }
  /**
   * Deletes a User into the database
   *TODO:this
   * @param User $user The user to be deleted
   * @throws PDOException if a database error occurs
   * @return void
   */
  public function delete(Actividad $actividad) {
    $stmt = $this->db->prepare("DELETE from actividad WHERE id_actividad=?");
    $stmt->execute(array($actividad->getId()));
  }
  /**
   * Updates a User in the database
   *TODO:this
   * @param User $user The user to be updated
   * @throws PDOException if a database error occurs
   * @return void
   */
  public function update(Actividad $actividad) {
    $stmt = $this->db->prepare("UPDATE actividad SET nombre=?, horario=?, descripcion=?, num_plazas=?, entrenador=? WHERE id_actividad=?");
    $stmt->execute( array( $actividad->getNombre(),$actividad->getHorario(), $actividad->getDescripcion(), $actividad->getNum_plazas(), $actividad->getEntrenador(), $actividad->getId() ) );
  }
  /**
   * Loads a User from the database given its id
   * @throws PDOException if a database error occurs
   * @return User The User instances
   * NULL if the User is not found
   * TODO: this
   */
  public function findById($actividadid){
    $stmt = $this->db->prepare("SELECT * FROM actividad WHERE id_actividad=?");
    $stmt->execute(array($actividadid));
    $actividad = $stmt->fetch(PDO::FETCH_ASSOC);

    if($actividad != null) {
      return new Actividad( $actividad["id_actividad"],
       $actividad["nombre"],
       $actividad["horario"],
       $actividad['descripcion'],
       $actividad["num_plazas"],
       $actividad["entrenador"] );
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
    $stmt = $this->db->query( "SELECT * FROM actividad" );
    $actividades_db = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $actividades = array();

    foreach ($actividades_db as $actividad) {
      array_push( $actividades, new Actividad(
        $actividad["id_actividad"], $actividad["nombre"],
        $actividad["horario"],
        $actividad["descripcion"],
        $actividad["num_plazas"],
        $actividad["entrenador"] ));
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

}