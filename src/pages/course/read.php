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
$limit = count($courses) < 3 ? count($courses) : 3;
?>
<html>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-body card">
        <img src="https://www.icc-portugal.com/images/imagem-de-destaque.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h3 class="card-title">EGESTAS TORTOR VULPUTATE</h3>
          <p class="card-text">Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum.
            Donec ullamcorper nulla non metus auctor fringilla. Donec sed odio dui. Cras</p>
          <button type="button" class="btn btn-primary">Inscreva-se</button>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <?php for ($x = 0; $x < $limit; $x++) {
      echo "<button type='button' data-bs-target='#carouselExampleIndicators' data-bs-slide-to=" . $x . " " . ($x == 0 ? "class='active'" : "class") . " aria-current=" . ($x == 0 ? "'true'" : "'false'") . " aria-label='Slide " . $x . "'></button>";
    }
    ?>
  </div>
  <div class="carousel-inner">
    <?php for ($x = 1; $x <= $limit; $x++) {
      $c = $courses[array_rand($courses)];
      echo "<div class='carousel-item" . ($x == 1 ? " active'" : "'") . ">";
      echo "  <img src='" . $c["image"] . "' height='402' width='1440' class='d-block w-100' alt='...'>";
      echo "  <div class='carousel-caption d-none d-md-block'>";
      echo "    <h4>" . $c["title"] . "</h4>";
      echo "    <p>" . $c["description"] . "</p>";
      echo "    <a href='./edit.php?id=" . $c["id"] . "' class='carouselbutton'>Ver curso</a>";
      echo "  </div>";
      echo "</div>";
    } ?>
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
<script>
  window.onload = (event) => {
    var show = localStorage.getItem('showModal');
    if(show){
      return;
    }
    var myModal = new bootstrap.Modal(document.getElementById('myModal'))
    myModal.toggle();
    localStorage.setItem('showModal', true);

  };
</script>
<?php require_once '../partials/footer.php'; ?>
