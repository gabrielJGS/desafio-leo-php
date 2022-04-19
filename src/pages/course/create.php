<?php

require_once '../../../config.php';
require_once '../../controllers/course.php';
require_once '../partials/header.php';

if (isset($_POST["title"]) && isset($_POST["description"]) && isset($_POST["image"]))
  createCourseAction($conn, $_POST["title"], $_POST["description"], $_POST["image"]);
?>
<div class="container">
  <div class="actionbuttons">
    <a href="javascript:history.back()" class="btn btn-warning">Voltar</a>
  </div>
  <form action="./create.php" method="POST" class="form">
    <div class="mb-3">
      <label for="title" class="form-label">Título</label>
      <input type="text" class="form-control" name="title" required placeholder="Digite o título do curso">
    </div>
    <div class="mb-3">
      <label for="description" class="form-label">Descrição</label>
      <input type="text" class="form-control" name="description" required placeholder="Digite a descrição do curso">
    </div>
    <div class="mb-3">
      <label for="description" class="form-label">Imagem</label>
      <input type="text" class="form-control" name="image" required placeholder="Escolha a imagem que irá representear o curso">
    </div>
    <button type="submit" class="btn btn-success">Enviar</button>
  </form>
</div>
<?php require_once '../partials/footer.php'; ?>
