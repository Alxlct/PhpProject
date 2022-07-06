<?php
?>


<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 fs-3">
<?php 
if((!empty($_SESSION["POST"]['cat'])) && (count($_SESSION["POST"]['cat'])>0)) {
  foreach($_SESSION["POST"]['cat'] as $index => $value) { 
    echo '<li class="nav-item ms-4">
    <a class="nav-link " href="../phpfunction.php?flux='.$arrayFluxIndex[$value].'">'.$value.'</a>
  </li>';
 }
 }
else {
  ?>
        <li class="nav-item ms-4">
          <a class="nav-link " href="../phpfunction.php?flux=0">Jeux Olympiques</a>
        </li>
        <li class="nav-item ms-4">
          <a class="nav-link" href="../phpfunction.php?flux=1">Sports de combat</a>
        </li>
        <li class="nav-item ms-4">
          <a class="nav-link" href="../phpfunction.php?flux=2">Sports US</a>
        </li>


        <?php } ?>
      </ul>
      <ul class="navbar-nav fs-3">
        <li class="nav-item">
          <a class="nav-link" href="../views/parameters.php"><i class="bi bi-gear me-2 "></i>paramètres</a>
        </li>
      </ul>
    </div>
  </div>
</nav>