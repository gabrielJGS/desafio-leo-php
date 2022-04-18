<?php

require_once '../../../config.php';
require_once '../../../src/controllers/course.php';
// require_once '../../../src/modules/messages.php';
require_once '../partials/header.php';

$courses = readCourseAction($conn);

?>
<html>
<div class="container">
  <div class="row">
    <a href="../../../">
      <h1>Cursos</h1>
    </a>
    <a class="btn btn-success text-white" href="./create.php">Novo</a>
  </div>
  <div class="row flex-center">
    
  </div>

  <table class="table-courses">
    <tr>
      <th>NAME</th>
      <th>EMAIL</th>
      <th>PHONE</th>
    </tr>
    <?php foreach ($courses as $row) : ?>
      <tr>
        <td class="course-title"><?= htmlspecialchars($row['title']) ?></td>
        <td class="course-description"><?= htmlspecialchars($row['description']) ?></td>
        <td class="course-image"><?= htmlspecialchars($row['image']) ?></td>
        <td class="course-link"><?= htmlspecialchars($row['link']) ?></td>
        <td>
          <a class="btn btn-primary text-white" href="./edit.php?id=<?= $row['id'] ?>">Editar</a>
        </td>
        <td>
          <a class="btn btn-danger text-white" href="./delete.php?id=<?= $row['id'] ?>">Remover</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>
</div>
<!-- <?php require_once '../partials/footer.php'; ?> -->
