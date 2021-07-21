<?php
include_once __DIR__ . '/header.php';
require_once __DIR__ . '/Class/List.php';
include __DIR__ . '/Class/Delete.php';

if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
  $delete = new Delete();
  $id = $_GET['id'];

  $delete->deleteData($id, 'users');
}
?>

<div class="table">
  <div id="newUser"><a href="creatUser.php" id="add">NOVO USUÁRIO</a></div>
  <table>
    <tr>
      <th class="sizeEight">id</th>
      <th>Nome</th>
      <th>Sexo</th>
      <th>Cidade</th>
      <th class="sizeEight">Edit</th>
      <th class="sizeEight">Delete</th>
    </tr>
    <?php foreach ((new Listing())->ListInfo("users") as $users) : ?>
      <tr>
        <td><?= $users['id'] ?></td>
        <td><?= $users['name'] ?></td>
        <td><?= $users['sexo'] ?></td>
        <td><?= $users['city'] ?></td>
        <td><a href="editUser.php?id=<?= $users['id']; ?>" id="edit">Edit</a></td>
        <td><a href="users.php?action=delete&id=<?= $users['id']; ?>" id="delete">Delete</a></td>
      </tr>
    <?php endforeach; ?>
  </table>
</div>

<?php include_once __DIR__ . '/footer.php'; ?>
