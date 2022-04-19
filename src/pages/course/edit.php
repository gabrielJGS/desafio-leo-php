<?php

require_once '../../../config.php';
require_once '../../controllers/course.php';
require_once '../partials/header.php';

if (isset($_POST["id"], $_POST["title"]) && isset($_POST["description"]) && isset($_POST["image"])) {
  updateCourseAction($conn, $_POST["id"], $_POST["title"], $_POST["description"], $_POST["image"]);
}
$course = findCourseAction($conn, $_GET['id']);
?>
<div class="container">
  <div class="actionbuttons">
    <a href="../../../index.php" class="btn btn-warning">Voltar</a>
    <form action="./delete.php" method="GET">
      <input type="hidden" name="id" value="<?= $course['id'] ?>" required />
      <button type="submit" class="btn btn-danger">Excluir</button>
    </form>
  </div>
  <form action="./edit.php" method="POST" class="form">
    <input type="hidden" name="id" value="<?= $course['id'] ?>" required />
    <div class="mb-3">
      <label for="title" class="form-label">Título</label>
      <input type="text" class="form-control" name="title" value="<?= $course['title'] ?>" required placeholder="Digite o título do curso">
    </div>
    <div class="mb-3">
      <label for="description" class="form-label">Descrição</label>
      <input type="text" class="form-control" name="description" value="<?= $course['description'] ?>" required placeholder="Digite a descrição do curso">
    </div>
    <div class="mb-3">
      <label for="description" class="form-label">Imagem</label>
      <input type="text" class="form-control" name="image" value="<?= $course['image'] ?>" required placeholder="Escolha a imagem que irá representear o curso">
    </div>
    <button type="submit" class="btn btn-primary">Salvar</button>
  </form>
</div>
<?php require_once '../partials/footer.php'; ?>
