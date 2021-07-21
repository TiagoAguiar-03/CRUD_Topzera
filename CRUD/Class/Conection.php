<?php

class Conection
{
  function conection()
  {
    try {
      $conn = new PDO('mysql:host=localhost;dbname=register;charset=utf8', 'root', '');
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      echo 'ERROR: ' . $e->getMessage();
    }
    return $conn;
  }
}
