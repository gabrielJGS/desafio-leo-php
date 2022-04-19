<?php

require_once '../../../config.php';
require_once '../../controllers/course.php';
require_once '../partials/header.php';

if (isset($_POST['id']))
  deleteCourseAction($conn, $_POST['id']);
?>
<div class="container">
  <form action="./delete.php" method="POST">
  <input type="hidden" name="id" value="<?= $_GET['id'] ?>" required />
    <div class="mb-3">
      <label for="title" class="form-label">Você tem certeza que deseja remover o curso?</label>
    </div>
    <button type="submit" class="btn btn-danger">Remover</button>
</div>
<?php require_once '../partials/footer.php'; ?>
