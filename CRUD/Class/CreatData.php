<?php

require_once __DIR__ . '/Conection.php';

class CreatData extends Conection
{
  /*---Parte das Pessoas---*/

  /**
   * public function insertUser
   * 
   *  --Essa função vai inserir os dados passados para o DB;
   * 
   * @param string $name;
   * @param string $sex;
   * @param string $city;
   * @param string $table;
   * 
   * @return bool
   */
  function insertUser(string $name, string $sex, string $city, string $table): bool
  {
    if ($this->verifyDataUser($name, $sex, $city) == true) {
      echo "<p class='center colorRed'>Dados Inválidos para inserir</p>";
      exit();
    }

    $conn = new Conection();
    try {
      $query = $conn->conection()->prepare("INSERT INTO $table (`name`, `sexo`, `city`) VALUES (?, ?, ?);");
      $query->bindParam(1, $name, PDO::PARAM_STR);
      $query->bindParam(2, $sex, PDO::PARAM_STR);
      $query->bindParam(3, $city, PDO::PARAM_STR);
      $query->execute();
    } catch (PDOException $e) {
      echo ($e->getMessage());
    }
    if ($this->verifyDataUser($name, $sex, $city) == true) {
      return true;
    } else {
      return false;
    }
  }

  /**
   * verifyDataUser
   * --Essa função vai verificar os dados para poderem ser inseridos no DB;
   * 
   * @param string $name;
   * @param string $year;
   * @param string $brand;
   * @return bool;
   */
  public function verifyDataUser(string $name, string $sex, string $city): bool
  {
    $name  = filter_var(preg_replace('/\\s\\s+/', ' ', $name), FILTER_SANITIZE_STRING);
    $sex   = filter_var(preg_replace('/\\s\\s+/', ' ', $sex), FILTER_SANITIZE_STRING);
    $city  = filter_var(preg_replace('/\\s\\s+/', ' ', $city), FILTER_SANITIZE_STRING);

    $score = 0;
    if (isset($name) && strlen($name) >= 8) {
      $score++;
    }
    if ($sex == 'Masculino' || $sex == 'Feminino' && strlen($sex) == 8) {
      $score++;
    }
    if (isset($city) && strlen($city) >= 4) {
      $score++;
    }
    if ($score == 3) {
      return false;
    } else {
      return true;
    }
  }

  /*Parte dos veículos*/

  /**
   * public function insertVeicles
   * 
   *  --Essa função vai inserir os dados passados para o DB;
   * 
   * @param string $name;
   * @param int $year;
   * @param string $brand;
   * @param string $table;
   * @return void
   */
  function insertVeicles(string $name, int $year, string $brand, string $table)
  {
    if ($this->verifyDataVeicles($name, $year, $brand) == true) {
      echo "<p class='center colorRed'>Dados Inválidos para inserir</p>";
      exit();
    }
    $conn = new Conection();
    $query = $conn->conection()->prepare("INSERT INTO $table (`name`, `year`, `brand`) VALUES (?, ?, ?);");
    $query->bindParam(1, $name, PDO::PARAM_STR);
    $query->bindParam(2, $year, PDO::PARAM_INT, 4);
    $query->bindParam(3, $brand, PDO::PARAM_STR);

    $query->execute();
  }

  /**
   * verifyDataVeicles
   * --Essa função vai verificar os dados para poderem ser inseridos no DB;
   * 
   * @param string $name;
   * @param int $year;
   * @param string $brand;
   * @return bool;
   */
  public function verifyDataVeicles(string $name, int $year, string $brand): bool
  {
    $name  = filter_var(preg_replace('/\\s\\s+/', ' ', $name), FILTER_SANITIZE_STRING);
    $year  = filter_var($year, FILTER_SANITIZE_NUMBER_INT);
    $brand = filter_var(preg_replace('/\\s\\s+/', ' ', $brand), FILTER_SANITIZE_STRING);

    $score = 0;
    if (isset($name) && strlen($name) >= 3) {
      $score++;
    }
    if (isset($year) && strlen($year) == 4) {
      $score++;
    }
    if (isset($brand) && strlen($brand) >= 2) {
      $score++;
    }
    if ($score == 3) {
      return false;
    } else {
      return true;
    }
  }
}
