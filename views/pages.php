<?php
$date_format = '%A %d %B %Y à %H:%M';
setlocale(LC_TIME, "fr_FR", "fra");
$A = 6;
$rssArray = [
    "https://rmcsport.bfmtv.com/rss/jeux-olympiques/",
    "https://rmcsport.bfmtv.com/rss/sports-de-combat//",
    "https://rmcsport.bfmtv.com/rss/sport-us/",
    "https://rmcsport.bfmtv.com/rss/handball/",
    "https://rmcsport.bfmtv.com/rss/volley/"
];

function recupXML($url)
{
    if (!@$rss = simplexml_load_file($url)) {
        throw new Exception('Flux introuvable');
    } else {
        return $rss->channel->item;
    }
}
if (isset($_GET["flux"])) {
    $flux = recupXML($rssArray[$_GET["flux"]]);
} else {
    $flux = recupXML($rssArray[0]);
}


?>


<?php require_once "../elements/meta.php"; ?>

<?php require_once "../elements/navBar.php"; ?>

<body class="bg-stadium">


    <div class="row m-0 p-0 justify-content-evenly">
        <div class="col-lg-8 m-1 text-center">
            <?php
            for ($i = 1; $i <= 20; $i++) { ?>
                <div class="rounded border border-secondary my-3 bg-light">
                    <img src="<?= $flux[$i]->enclosure['url'] ?>" alt="<?= $flux[$i]->enclosure['url'] ?>" class="imgSize my-2">
                    <p class="text-start px-1"><b><?= $flux[$i]->title ?></b></p>
                    <p class="text-start px-1"><?= strftime($date_format, strtotime($flux[$i]->pubDate)) ?></p>
                    <a href="<?= $flux[$i]->link ?>" target="_blank" class="btn btn-success text-center mb-3"><u>Ouvrir l'article</u></a>
                </div>
            <?php } ?>
        </div>
    </div>

    <div id="scroll_to_top">
        <a href="#top"><img src="../assets/img/Arrow_top.png" alt="Retourner en haut" /></a>
    </div>

    <?php require_once "../elements/footer.php" ?>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>