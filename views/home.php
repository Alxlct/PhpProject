<?php
$A = 6;

$fluxRSS = "https://rmcsport.bfmtv.com/rss/jeux-olympiques/";

function recupXML($url)
{
    if (!@$rss = simplexml_load_file($url)) {
        throw new Exception('Flux introuvable');
    } else {
        return $rss;
    }
}
try {
    $rss = recupXML($fluxRSS);

    $olympics = $rss->channel->item;
} catch (Exception $e) {
    echo $e->getMessage();
}
$date_format = '%A %d %B %Y à %H:%M';
setlocale(LC_TIME, "fr_FR", "fra");

$fluxRSS2 = "https://rmcsport.bfmtv.com/rss/sports-de-combat/";

function recupXML2($url)
{
    if (!@$rss = simplexml_load_file($url)) {
        throw new Exception('Flux introuvable');
    } else {
        return $rss;
    }
}
try {
    $rss = recupXML($fluxRSS2);

    $combat = $rss->channel->item;
} catch (Exception $e) {
    echo $e->getMessage();
}

$fluxRSS3 = "https://rmcsport.bfmtv.com/rss/sport-us/";

function recupXML3($url)
{
    if (!@$rss = simplexml_load_file($url)) {
        throw new Exception('Flux introuvable');
    } else {
        return $rss;
    }
}
try {
    $rss = recupXML($fluxRSS3);

    $usSports = $rss->channel->item;
} catch (Exception $e) {
    echo $e->getMessage();
}
?>

<?php require_once "../elements/meta.php"; ?>

<?php require_once "../elements/navBar.php"; ?>



<body class="bg-stadium">

    <div class="bg-stadium row text-center justify-content-center p-0 m-0">
        <div class="col-lg-9">
            <h1 class="text-center bg-light text-dark my-3 rounded shadow p-3 border border-dark">RsSport</h1>
        </div>
    </div>
    <div class="row p-0 m-0 justify-content-center">
        <div class="col-lg-11 col-10 bg-light shadow rounded border border-dark">

            <div class="row justify-content-center text-center my-3">
                <div class="col-lg-8 justify-content-center text-center">
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="<?= $olympics->enclosure['url'] ?>" class="d-block w-100" alt="...">
                                <p class="text-start"><b><?= $olympics->title ?></b></p>
                                <p class="text-start"><?= strftime($date_format, strtotime($olympics->pubDate)) ?></p>
                                <a href="<?= $olympics->link ?>" target="_blank" class="btn btn-success text-center mb-3"><u>Ouvrir l'article</u></a>

                            </div>
                            <div class="carousel-item">
                                <img src="<?= $combat->enclosure['url'] ?>" class="d-block w-100" alt="...">
                                <p class="text-start"><b><?= $combat->title ?></b></p>
                                <p class="text-start"><?= strftime($date_format, strtotime($combat->pubDate)) ?></p>
                                <a href="<?= $combat->link ?>" target="_blank" class="btn btn-success text-center mb-3"><u>Ouvrir l'article</u></a>
                            </div>
                            <div class="carousel-item">
                                <img src="<?= $usSports->enclosure['url'] ?>" class="d-block w-100" alt="...">
                                <p class="text-start"><b><?= $usSports->title ?></b></p>
                                <p class="text-start"><?= strftime($date_format, strtotime($usSports->pubDate)) ?></p>
                                <a href="<?= $usSports->link ?>" target="_blank" class="btn btn-success text-center mb-3"><u>Ouvrir l'article</u><a>
                            </div>
                        </div>
                        <button class="carousel-control-prev " type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon bg-success" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                            <span class="carousel-control-next-icon bg-success" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>


            <!-- @@@  ----------------------------------------------                              CARDS                                                @@@ -->







            <div class="row m-0 p-0 justify-content-evenly">
                <div class="col-lg-3 m-1 text-center">
                    <?php
                    for ($i = 1; $i < $A; $i++) { ?>
                        <div class="rounded border border-secondary my-3">
                            <img src="<?= $olympics[$i]->enclosure['url'] ?>" alt="<?= $olympics[$i]->enclosure['url'] ?>" class="imgSize my-2">
                            <p class="text-start px-1"><b><?= $olympics[$i]->title ?></b></p>
                            <p class="text-start px-1"><?= strftime($date_format, strtotime($olympics[$i]->pubDate)) ?></p>
                            <a href="<?php echo $olympics[$i]->link ?>" target="_blank" class="btn btn-success text-center mb-3"><u>Ouvrir l'article</u></a>
                        </div>
                    <?php } ?>
                </div>

                <div class="col-lg-3 m-1 text-center">
                    <?php
                    for ($i = 1; $i < $A; $i++) { ?>
                        <div class="rounded border border-secondary my-3">
                            <img src="<?= $combat[$i]->enclosure['url'] ?>" alt="<?= $combat[$i]->enclosure['url'] ?>" class="imgSize my-2">
                            <p class="text-start px-1"><b><?= $combat[$i]->title ?></b></p>
                            <p class="text-start px-1"><?= strftime($date_format, strtotime($combat[$i]->pubDate)) ?></p>
                            <a href="<?php echo $combat[$i]->link ?>" target="_blank" class="btn btn-success text-center mb-3"><u>Ouvrir l'article</u></a>
                        </div>
                    <?php } ?>
                </div>

                <div class="col-lg-3 m-1 text-center">
                    <?php
                    for ($i = 1; $i < $A; $i++) { ?>
                        <div class="rounded border border-secondary my-3">
                            <img src="<?= $usSports[$i]->enclosure['url'] ?>" alt="<?= $usSports[$i]->enclosure['url'] ?>" class="imgSize my-2">
                            <p class="text-start px-1"><b><?= $usSports[$i]->title ?></b></p>
                            <p class="text-start px-1"><?= strftime($date_format, strtotime($usSports[$i]->pubDate)) ?></p>
                            <a href="<?php echo $usSports[$i]->link ?>" target="_blank" class="btn btn-success text-center mb-3"><u>Ouvrir l'article</u></a>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>


    <?php require_once "../elements/footer.php" ?>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>