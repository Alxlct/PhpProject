<?php

session_start();
var_dump($_SESSION);
var_dump($_POST);

require_once '../controllers/parameters-controller.php';
?>

<?php include '../elements/meta.php' ?>
<?php include '../elements/navBar.php' ?>

<body class="d-flex flex-column min-vh-100">

    <form action="#" method="post">
        <div class="text-center fs-3">
            <p>Type de recherche</p>
        </div>
        <div class="row justify-content-center m-0 p-0">
            <div class="col-lg-2 m-3 border border-dark ">
                <div class="form-check">
                    <input class="form-check-input myCheckbox" type="checkbox" value="Jeux Olympiques" id="check1" name="cat[]">
                    <label class="form-check-label" for="check1">
                        Jeux Olympiques
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input myCheckbox" type="checkbox" value="Sports de combat" id="check2" name="cat[]">
                    <label class="form-check-label" for="check2">
                        Sports de combat
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input myCheckbox" type="checkbox" value="Sports us" id="check3" name="cat[]">
                    <label class="form-check-label" for="check3">
                        Sports us
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input myCheckbox" type="checkbox" value="Handball" id="check4" name="cat[]">
                    <label class="form-check-label" for="check4">
                        Handball
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input myCheckbox" type="checkbox" value="Volley" id="check5" name="cat[]">
                    <label class="form-check-label" for="check5">
                        Volley
                    </label>
                </div>

            </div>


            <div class="col-lg-2 m-3 border border-dark">
                <div class="form-check">
                    <input class="form-check-input " type="radio" value="6" id="num1" name="articles">
                    <label class="form-check-label" for="num1">
                        6
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input " type="radio" value="9" id="num2" name="articles">
                    <label class="form-check-label" for="num2">
                        9
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input " type="radio" value="12" id="num3" name="articles">
                    <label class="form-check-label" for="num3">
                        12
                    </label>
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary" name="validate">Valider</button>
            </div>


        </div>


    </form>

    <?php include '../elements/footer.php' ?>


    <script>
        // !!! en amont !!! , mettre une classe 'myCheckbox' sur les checkbox pour lesquelles vous souhaitez limiter les checkBox

        const allCheckbox = document.querySelectorAll(".myCheckbox");

        allCheckbox.forEach((element) => {
            element.addEventListener("change", function() {
                let onlyCheckedItems = document.querySelectorAll(
                    ".myCheckbox:checked"
                );
                //   Nous avons définit le nombre max de checkbox à 3
                if (onlyCheckedItems.length > 3) {
                    this.checked = false;
                }
            });
        });

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>