<?php
include_once __DIR__ . '/header.php';
include_once __DIR__ . '/Class/List.php';

$id = $_GET['id'];
$table = 'users';

foreach ((new Listing())->ListForEdit($id, $table) as $users) : ?>

  <div id="alert">
    <p id="tHelp">Aviso!!!</p>
    <p id="help">Se as informações estiverem todas corretas, você será redirecionado para a página que está a tabela.</p>
  </div>

  <div id="form">
    <form action="editing.php?id=<?= $id ?>" method="POST">
      <h1>Editando Usuário ...</h1>
      <input type="text" name="name" placeholder="NOME" minlength="8" maxlength="30" value="<?= $users['name'] ?>">
      <br>
      <input type="text" name="sex" placeholder="SEXO" minlength="8" value="<?= $users['sexo'] ?>">
      <br>
      <input type="text" name="city" placeholder="CIDADE" minlength="4" maxlength="30" value="<?= $users['city'] ?>">
      <br>
      <input type="submit" value="Editar" id="creat">
    </form>
  </div>

<?php endforeach;
include_once __DIR__ . '/footer.php';
?>
