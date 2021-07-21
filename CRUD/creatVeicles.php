<?php
require_once __DIR__ . '/header.php';

require_once __DIR__ . '/Class/CreatData.php';

$insert = new CreatData();

if (isset($_POST['name']) && isset($_POST['year']) && isset($_POST['brand'])) {
  $name = $_POST['name'];
  $year = $_POST['year'];
  $brand = $_POST['brand'];
  $table = 'veicles';

  $insert->insertVeicles($name, $year, $brand, $table);
  header("Location: veicles.php");
}

?>

<div id="alert">
  <p id="tHelp">Aviso!!!</p>
  <p id="help">Se as informações estiverem todas corretas, você será redirecionado para a página que está a tabela.</p>
</div>

<div id="form">
  <form action="" method="POST">
    <h1>Novo Veículo</h1>
    <input type="text" name="name" placeholder="NOME">
    <br>
    <input type="number" name="year" placeholder="ANO DE FABRICAÇÃO">
    <br>
    <input type="text" name="brand" placeholder="MARCA">
    <br>
    <input type="submit" value="Criar" id="creat">
  </form>
</div>

<?php require_once __DIR__ . '/footer.php'; ?>
