<?php

require_once '../../../config.php';
require_once '../../../src/controllers/course.php';
require_once '../../../src/modules/messages.php';
require_once '../partials/header.php';

$search_text = "";
if (isset($_GET['search'])) {
  $search_text = $_GET['search'];
}
$courses = readCourseAction($conn, $search_text);

?>
<html>
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://static.wixstatic.com/media/694c88_aefbf6f60ee34b6cb674ea4cc682b102~mv2.png/v1/fill/w_1280,h_202,al_c,enc_auto/694c88_aefbf6f60ee34b6cb674ea4cc682b102~mv2.png" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h4>LOREM IPSUM</h4>
        <p>Aenean lacinia bibendum nulla sed consectetur. Cum socis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi leo risus, porta ac consec tetur ac, vestibulum at eros.</p>
        <a href="#" class="carouselbutton">Ver curso</a>
      </div>
    </div>
    <div class="carousel-item">
      <img src="https://static.wixstatic.com/media/694c88_aefbf6f60ee34b6cb674ea4cc682b102~mv2.png/v1/fill/w_1280,h_202,al_c,enc_auto/694c88_aefbf6f60ee34b6cb674ea4cc682b102~mv2.png" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h4>LOREM IPSUM</h4>
        <p>Aenean lacinia bibendum nulla sed consectetur. Cum socis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi leo risus, porta ac consec tetur ac, vestibulum at eros.</p>
        <a href="#" class="carouselbutton">Ver curso</a>
      </div>
    </div>
    <div class="carousel-item">
      <img src="https://static.wixstatic.com/media/694c88_aefbf6f60ee34b6cb674ea4cc682b102~mv2.png/v1/fill/w_1280,h_202,al_c,enc_auto/694c88_aefbf6f60ee34b6cb674ea4cc682b102~mv2.png" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h4>LOREM IPSUM</h4>
        <p>Aenean lacinia bibendum nulla sed consectetur. Cum socis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi leo risus, porta ac consec tetur ac, vestibulum at eros.</p>
        <a href="#" class="carouselbutton">Ver curso</a>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<div class="container">
  <?php if (isset($_GET['message'])) echo (printMessage($_GET['message'])); ?>
  <h3 style="padding-top: 25px;">MEUS CURSOS</h3>
  <hr><br>
  <div class="row row-cols-1 row-cols-md-4 g-4">
    <?php foreach ($courses as $row) : ?>
      <div class="col">
        <div class="card h-100">
          <img src="<?= htmlspecialchars($row['image']) ?>" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title"><?= htmlspecialchars($row['title']) ?></h5>
            <p class="card-text text-muted"><?= htmlspecialchars($row['description']) ?></p>
            <a href="./edit.php?id=<?= htmlspecialchars($row['id']) ?>" class="btn btn-success">Ver curso</a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
    <div class="col">
      <a href="./create.php" id="novocurso" class="card h-100">
        <div class="card-body">
          <svg xmlns="http://www.w3.org/2000/svg" width="128" height="128" fill="currentColor" class="bi bi-window-plus" viewBox="0 0 16 16">
            <path d="M2.5 5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1ZM4 5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1Zm2-.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0Z" />
            <path d="M0 4a2 2 0 0 1 2-2h11a2 2 0 0 1 2 2v4a.5.5 0 0 1-1 0V7H1v5a1 1 0 0 0 1 1h5.5a.5.5 0 0 1 0 1H2a2 2 0 0 1-2-2V4Zm1 2h13V4a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v2Z" />
            <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-3.5-2a.5.5 0 0 0-.5.5v1h-1a.5.5 0 0 0 0 1h1v1a.5.5 0 0 0 1 0v-1h1a.5.5 0 0 0 0-1h-1v-1a.5.5 0 0 0-.5-.5Z" />
          </svg>
          <h4 class="card-text">ADICIONAR</h6>
            <h3 class="card-title">CURSO</h5>
        </div>
      </a>
    </div>
  </div>
</div>
<?php require_once '../partials/footer.php'; ?>
