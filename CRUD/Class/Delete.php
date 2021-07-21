<?php
include_once __DIR__ . '/Conection.php';

class Delete
{
  /**
   * function verifyId
   * 
   * @param int $id;
   */
  public function DeleteData(int $id, string $table)
  {
    $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);

    if (isset($id) && $id > 0) {
      try {
        $conn = new Conection();
        $query = $conn->conection()->prepare("DELETE FROM `$table` WHERE `id` = ?");
        $query->bindParam(1, $id, PDO::PARAM_INT);
        $query->execute();
      } catch (PDOException $e) {
        echo ($e->getMessage());
      }
    }
  }
}
