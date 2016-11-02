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
class ExerciseMapper {

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
  public function add($exercise) {
    $stmt = $this->db->prepare( "INSERT INTO ejercicio (nombre_ejercicio, tipo_ejercicio, detalles_ejercicio, dificultad_ejercicio) values (?,?,?,?)" );
    $stmt->execute(array( $exercise->getName(), $exercise->getType(), $exercise->getDetails(), $exercise->getDifficulty() ) );
  }

  /**
   * Deletes a User into the database
   *TODO:this
   * @param User $user The user to be deleted
   * @throws PDOException if a database error occurs
   * @return void
   */
  public function delete(Exercise $ejercicio) {
    $stmt = $this->db->prepare("DELETE from ejercicio WHERE id_ejercicio=?");
    $stmt->execute(array($ejercicio->getId()));
  }

  /**
   * Updates a User in the database
   *TODO:this
   * @param User $user The user to be updated
   * @throws PDOException if a database error occurs
   * @return void
   */
  public function update(Exercise $exercise) {
    $stmt = $this->db->prepare("UPDATE ejercicio set nombre_ejercicio=?, tipo_ejercicio=?, detalles_ejercicio=?, dificultad_ejercicio=? where id_ejercicio=?");
    $stmt->execute( array( $exercise->getName(), $exercise->getType(), $exercise->getDetails(), $exercise->getDifficulty(), $exercise->getId() ) );
  }

  /**
   * Loads a User from the database given its id
   * @throws PDOException if a database error occurs
   * @return User The User instances
   * NULL if the User is not found
   * TODO: this
   */
  public function findById($exerciseid){
    $stmt = $this->db->prepare("SELECT * FROM ejercicio WHERE id_ejercicio=?");
    $stmt->execute(array($exerciseid));
    $exercise = $stmt->fetch(PDO::FETCH_ASSOC);

    if($exercise != null) {
      return new Exercise( $exercise["id_ejercicio"], $exercise["nombre_ejercicio"], $exercise['tipo_ejercicio'], $exercise["detalles_ejercicio"], $exercise["dificultad_ejercicio"] );
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
    $stmt = $this->db->query( "SELECT * FROM ejercicio" );
    $exercises_db = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $exercises = array();

    foreach ($exercises_db as $exercise) {
      array_push( $exercises, new Exercise( $exercise["id_ejercicio"], $exercise["nombre_ejercicio"], $exercise["tipo_ejercicio"], $exercise["detalles_ejercicio"], $exercise["dificultad_ejercicio"] ) );
    }

    return $exercises;
  }

  /**
   * Checks if a given username is already in the database
   *TODO:here
   * @param string $username the username to check
   * @return boolean true if the username exists, false otherwise
   */
  public function nameExists($name) {
    $stmt = $this->db->prepare( "SELECT count(nombre_ejercicio) FROM ejercicio where nombre_ejercicio=?" );
    $stmt->execute(array($name));

    if ($stmt->fetchColumn() > 0) {
      return true;
    }
  }

}