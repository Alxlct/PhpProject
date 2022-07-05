<?php
session_start();

$date_format = '%A %d %B %Y à %H:%M';
setlocale(LC_TIME, "fr_FR", "fra");

$rssArray = [
    "https://rmcsport.bfmtv.com/rss/jeux-olympiques/",
    "https://rmcsport.bfmtv.com/rss/sports-de-combat//",
    "https://rmcsport.bfmtv.com/rss/sport-us/",
    "https://rmcsport.bfmtv.com/rss/handball/",
    "https://rmcsport.bfmtv.com/rss/volley/"
];

$A = 6;

function recupXML($url)
{
    if (!@$rss = simplexml_load_file($url)) {
        throw new Exception('Flux introuvable');
    } else {
        return $rss->channel->item;
    }
}
$flux1 = recupXML($rssArray[0]);
$flux2 = recupXML($rssArray[1]);
$flux3 = recupXML($rssArray[2]);

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
        <div class="col-lg-11 col-10 bg-Sports shadow rounded border border-dark">

            <div class="row bg-light justify-content-center text-center my-3">
                <div class="col-lg-8 justify-content-center text-center">
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="<?= $flux1->enclosure['url'] ?>" class="d-block w-100" alt="...">
                                <p class="text-start"><b><?= $flux1->title ?></b></p>
                                <p class="text-start"><?= strftime($date_format, strtotime($flux1->pubDate)) ?></p>
                                <a href="<?= $flux1->link ?>" target="_blank" class="btn btn-success text-center mb-3"><u>Ouvrir l'article</u></a>

                            </div>
                            <div class="carousel-item">
                                <img src="<?= $flux2->enclosure['url'] ?>" class="d-block w-100" alt="...">
                                <p class="text-start"><b><?= $flux2->title ?></b></p>
                                <p class="text-start"><?= strftime($date_format, strtotime($flux2->pubDate)) ?></p>
                                <a href="<?= $flux2->link ?>" target="_blank" class="btn btn-success text-center mb-3"><u>Ouvrir l'article</u></a>
                            </div>
                            <div class="carousel-item">
                                <img src="<?= $flux3->enclosure['url'] ?>" class="d-block w-100" alt="...">
                                <p class="text-start"><b><?= $flux3->title ?></b></p>
                                <p class="text-start"><?= strftime($date_format, strtotime($flux3->pubDate)) ?></p>
                                <a href="<?= $flux3->link ?>" target="_blank" class="btn btn-success text-center mb-3"><u>Ouvrir l'article</u><a>
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
                        <div class="rounded border border-secondary my-3 bg-light">
                            <img src="<?= $flux1[$i]->enclosure['url'] ?>" alt="<?= $flux1[$i]->enclosure['url'] ?>" class="imgSize my-2">
                            <p class="text-start px-1"><b><?= $flux1[$i]->title ?></b></p>
                            <p class="text-start px-1"><?= strftime($date_format, strtotime($flux1[$i]->pubDate)) ?></p>
                            <a href="<?= $flux1[$i]->link ?>" target="_blank" class="btn btn-success text-center mb-3"><u>Ouvrir l'article</u></a>
                        </div>
                    <?php } ?>
                </div>

                <div class="col-lg-3 m-1 text-center">
                    <?php
                    for ($i = 1; $i < $A; $i++) { ?>
                        <div class="rounded border border-secondary bg-light my-3">
                            <img src="<?= $flux2[$i]->enclosure['url'] ?>" alt="<?= $flux2[$i]->enclosure['url'] ?>" class="imgSize my-2">
                            <p class="text-start px-1"><b><?= $flux2[$i]->title ?></b></p>
                            <p class="text-start px-1"><?= strftime($date_format, strtotime($flux2[$i]->pubDate)) ?></p>
                            <a href="<?php echo $flux2[$i]->link ?>" target="_blank" class="btn btn-success text-center mb-3"><u>Ouvrir l'article</u></a>
                        </div>
                    <?php } ?>
                </div>

                <div class="col-lg-3 m-1 text-center">
                    <?php
                    for ($i = 1; $i < $A; $i++) { ?>
                        <div class="rounded border border-secondary bg-light my-3">
                            <img src="<?= $flux3[$i]->enclosure['url'] ?>" alt="<?= $flux3[$i]->enclosure['url'] ?>" class="imgSize my-2">
                            <p class="text-start px-1"><b><?= $flux3[$i]->title ?></b></p>
                            <p class="text-start px-1"><?= strftime($date_format, strtotime($flux3[$i]->pubDate)) ?></p>
                            <a href="<?php echo $flux3[$i]->link ?>" target="_blank" class="btn btn-success text-center mb-3"><u>Ouvrir l'article</u></a>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>

    <div id="scroll_to_top">
        <a href="#top"><img src="../assets/img/Arrow_top.png" alt="Retourner en haut" /></a>
    </div>
    <?php require_once "../elements/footer.php" ?>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>