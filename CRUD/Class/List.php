<?php
require_once __DIR__ . '/Conection.php';

class Listing extends Conection
{
  /**
   * public function ListInfo
   * @param string $table;
   * 
   * @return array
   */
  public function ListInfo(string $table): array
  {
    try {
      $conn = new Conection();
      $query = $conn->conection()->prepare("SELECT * FROM $table");
      $query->execute();

      return $query->fetchAll();
    } catch (PDOException $e) {
      echo ($e->getMessage());
    }
  }

  /**
   * public function ListInfo
   * @param $id;
   * 
   * @return array
   */
  public function ListForEdit($id, $table): array
  {
    try {
      $conn = new Conection();
      $query = $conn->conection()->prepare("SELECT * FROM `$table` WHERE `id` = $id");
      $query->execute();

      return $query->fetchAll();
    } catch (PDOException $e) {
      echo ($e->getMessage());
    }
  }
}
