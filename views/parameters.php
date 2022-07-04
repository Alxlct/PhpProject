<?php

session_start();

require_once '../controllers/parameters-controller.php';

var_dump($_SESSION)

?>

<?php include '../elements/meta.php' ?>

<?php include '../elements/navBar.php' ?>

<body>

<form action="#" method="post">
    <div class="text-center fs-3">
        <p>Type de recherche</p>
    </div>

    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="Jeux Olympiques" id="check1" name="cat[]">
        <label class="form-check-label" for="check1">
            Jeux Olympiques
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="Sports de combat" id="check2" name="cat[]">
        <label class="form-check-label" for="check2">
            Sports de combat
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="Sports us" id="check3" name="cat[]">
        <label class="form-check-label" for="check3">
            Sports us
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="Handball" id="check4" name="cat[]">
        <label class="form-check-label" for="check4">
            Handball
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="Volley" id="check5"name="cat[]">
        <label class="form-check-label" for="check5">
            Volley
        </label>
    </div>

    <button type="submit" class="btn btn-primary" name="validate">Valider</button>

    </form>









    <?php include '../elements/footer.php' ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>