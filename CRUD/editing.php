<?php
require_once __DIR__ . '/header.php';
require_once __DIR__ . '/Class/CreatData.php';

$update = new CreatData();

if (isset($_POST['name']) && isset($_POST['sex']) && isset($_POST['city'])) {
  $name = $_POST['name'];
  $sex = $_POST['sex'];
  $city = $_POST['city'];
  $table = 'users';
  $id = $_GET['id'];

  editUser($name, $sex, $city, $table, $id);
  header('Location: users.php');
}
if (isset($_POST['name']) && isset($_POST['year']) && isset($_POST['brand'])) {
  $name = $_POST['name'];
  $year = $_POST['year'];
  $brand = $_POST['brand'];
  $table = 'veicles';
  $id = $_GET['id'];

  editVeicles($name,$year, $brand, $table, $id);
  header('Location: veicles.php');
}

/**
 * function editUser;
 * 
 * @param string $name;
 * @param string $sex;
 * @param string $city;
 * @param string $table;
 * 
 * @return bool
 */
function editUser(string $name, string $sex, string $city, string $table, int $id): bool
{
  $update = new CreatData();
  if ($update->verifyDataUser($name, $sex, $city) == true) {
    echo "<p class='center colorRed'>Dados Inválidos para Editar</p>";
    exit();
  }
  $conn = new Conection();

  try {
    $query = $conn->conection()->prepare("UPDATE $table SET `name` = ?, `sexo` = ?, `city` = ? WHERE `id` = $id ;");
    $query->bindParam(1, $name, PDO::PARAM_STR);
    $query->bindParam(2, $sex, PDO::PARAM_STR);
    $query->bindParam(3, $city, PDO::PARAM_STR);
    $query->execute();
  } catch (PDOException $e) {
    echo ($e->getMessage());
  }
  if ($update->verifyDataUser($name, $sex, $city) == true) {
    return true;
  } else {
    return false;
  }
}

/**
 * function editUser;
 * 
 * @param string $name;
 * @param int $year;
 * @param string $city;
 * @param string $table;
 * 
 * @return bool
 */
function editVeicles(string $name, int $year, string $brand, string $table, int $id): bool
{
  $update = new CreatData();
  if ($update->verifyDataVeicles($name, $year, $brand) == true) {
    echo "<p class='center colorRed'>Dados Inválidos para Editar</p>";
    exit();
  }

  $conn = new Conection();
  try {
    $query = $conn->conection()->prepare("UPDATE $table SET `name` = ?, `year` = ?, `brand` = ? WHERE `id` = $id ;");
    $query->bindParam(1, $name, PDO::PARAM_STR);
    $query->bindParam(2, $year, PDO::PARAM_STR,4);
    $query->bindParam(3, $brand, PDO::PARAM_STR);
    $query->execute();
  } catch (PDOException $e) {
    echo ($e->getMessage());
  }
  if ($update->verifyDataVeicles($name, $year, $brand) == true) {
    return true;
  } else {
    return false;
  }
}
