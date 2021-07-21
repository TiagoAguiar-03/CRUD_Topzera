<?php
require_once __DIR__ . '/header.php';
require_once __DIR__ . '/Class/CreatData.php';

$insert = new CreatData();

if (isset($_POST['name']) && isset($_POST['sex']) && isset($_POST['city'])) {
  $name = $_POST['name'];
  $sex = $_POST['sex'];
  $city = $_POST['city'];
  $table = 'users';

  $insert->insertUser($name, $sex, $city, $table);
  header('Location: users.php');
}
?>
<div id="alert">
  <p id="tHelp">Aviso!!!</p>
  <p id="help">Se as informações estiverem todas corretas, você será redirecionado para a página que está a tabela.</p>
</div>

<div id="form">
  <form action="creatUser.php" method="POST">
    <h1>Novo Usuário</h1>
    <input type="text" name="name" placeholder="NOME" minlength="8" maxlength="30">
    <br>
    <input type="text" name="sex" placeholder="SEXO" minlength="8">
    <br>
    <input type="text" name="city" placeholder="CIDADE" minlength="4" maxlength="30">
    <br>
    <input type="submit" value="Criar" id="creat">
  </form>
</div>

<?php require_once __DIR__ . '/footer.php'; ?>
