<?php
include_once __DIR__ . '/header.php';
require_once __DIR__ . '/Class/List.php';
include __DIR__ . '/Class/Delete.php';

if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
  $delete = new Delete();
  $id = $_GET['id'];

  $delete->deleteData($id, 'veicles');
}
?>

<div class="table">
  <div id="newUser"><a href="creatVeicles.php" id="add">NOVO VEÍCULO</a></div>
  <table>
    <tr>
      <th class="sizeEight">id</th>
      <th>Nome</th>
      <th>Data de Fabricação</th>
      <th>Marca</th>
      <th class="sizeEight">Edit</th>
      <th class="sizeEight">Delete</th>
    </tr>
    <?php foreach ((new Listing())->ListInfo("veicles") as $data) : ?>
      <tr>
        <td><?= $data['id'] ?></td>
        <td><?= $data['name'] ?></td>
        <td><?= $data['year'] ?></td>
        <td><?= $data['brand'] ?></td>
        <td><a href="editVeicles.php?id=<?= $data['id']; ?>" id="edit">Edit</a></td>
        <td><a href="veicles.php?action=delete&id=<?= $data['id']; ?>" id="delete">Delete</a></td>
      </tr>
    <?php endforeach; ?>
  </table>
</div>

<?php include_once __DIR__ . '/footer.php'; ?>
