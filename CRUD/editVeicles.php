<?php
include_once __DIR__ . '/header.php';
include_once __DIR__ . '/Class/List.php';

$id = $_GET['id'];
$table = 'veicles';

foreach ((new Listing())->ListForEdit($id, $table) as $data) : ?>

  <div id="alert">
    <p id="tHelp">Aviso!!!</p>
    <p id="help">Se as informações estiverem todas corretas, você será redirecionado para a página que está a tabela.</p>
  </div>

  <div id="form">
    <form action="editing.php?id=<?= $id ?>" method="POST">
      <h1>Editando Veículos ...</h1>
      <input type="text" name="name" placeholder="NOME" minlength="8" maxlength="30" value="<?= $data['name'] ?>">
      <br>
      <input type="number" name="year" placeholder="ANO" minlength="4" value="<?= $data['year'] ?>">
      <br>
      <input type="text" name="brand" placeholder="MARCA" minlength="4" maxlength="30" value="<?= $data['brand'] ?>">
      <br>
      <input type="submit" value="Editar" id="creat">
    </form>
  </div>

<?php endforeach;
include_once __DIR__ . '/footer.php';
?>
