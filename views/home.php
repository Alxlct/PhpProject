<?php
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

function recupXML2 ($url)
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

function recupXML3 ($url)
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

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/style/style.css">
    <title>Actualités Sportives, Jeux olympiques 2024.</title>
</head>

<body class="bg-stadium">
    <div class="row text-center justify-content-center p-0 m-0">
        <div class="col-lg-9">
            <h1 class="text-center bg-light text-dark my-3 rounded shadow p-3 border border-dark">RsSport</h1>
        </div>
    </div>
    <div class="row p-0 m-0 justify-content-center">
        <div class="col-lg-11 col-10 bg-light shadow rounded border border-secondary">


            <div class="row m-0 p-0 justify-content-evenly">
                <div class="col-lg-3 m-1 border border-secondary rounded text-center">
                    <img src="<?= $olympics->enclosure['url'] ?>" alt="<?= $olympics->enclosure['url'] ?>" class="imgSize my-2">
                    <p class="text-start"><b><?= $olympics->title ?></b></p>
                    <p class="text-start"><?= strftime($date_format, strtotime($olympics->pubDate)) ?></p>
                    <a href="<?php echo $olympics->link ?>" target="_blank" class="btn btn-success text-center mb-3"><u>Ouvrir l'article</u></a>
                </div>
                <div class="col-lg-3 m-1 border border-secondary rounded text-center">
                    <img src="<?= $combat->enclosure['url'] ?>" alt="<?= $combat->enclosure['url'] ?>" class="imgSize my-2">
                    <p class="text-start"><b><?= $combat->title ?></b></p>
                    <p class="text-start"><?= strftime($date_format, strtotime($combat->pubDate)) ?></p>
                    <a href="<?php echo $combat->link ?>" target="_blank" class="btn btn-success text-center mb-3"><u>Ouvrir l'article</u></a>
                </div>
                <div class="col-lg-3 m-1 border border-secondary rounded text-center">
                    <img src="<?= $usSports->enclosure['url'] ?>" alt="<?= $olympics->enclosure['url'] ?>" class="imgSize my-2">
                    <p class="text-start"><b><?= $usSports->title ?></b></p>
                    <p class="text-start"><?= strftime($date_format, strtotime($usSports->pubDate)) ?></p>
                    <a href="<?php echo $usSports->link ?>" target="_blank" class="btn btn-success text-center mb-3"><u>Ouvrir l'article</u></a>
                </div>
            </div>
            <div class="row m-0 p-0 justify-content-evenly">
                <div class="col-lg-3 m-1 border border-secondary rounded text-center">
                    <img src="<?= $olympics->enclosure['url'] ?>" alt="<?= $olympics->enclosure['url'] ?>" class="imgSize my-2">
                    <p class="text-start"><b><?= $olympics->title ?></b></p>
                    <p class="text-start"><?= strftime($date_format, strtotime($olympics->pubDate)) ?></p>
                    <a href="<?php echo $olympics->link ?>" target="_blank" class="btn btn-success text-center mb-3"><u>Ouvrir l'article</u></a>
                </div>
                <div class="col-lg-3 m-1 border border-secondary rounded text-center">
                    <img src="<?= $combat->enclosure['url'] ?>" alt="<?= $combat->enclosure['url'] ?>" class="imgSize my-2">
                    <p class="text-start"><b><?= $combat->title ?></b></p>
                    <p class="text-start"><?= strftime($date_format, strtotime($combat->pubDate)) ?></p>
                    <a href="<?php echo $combat->link ?>" target="_blank" class="btn btn-success text-center mb-3"><u>Ouvrir l'article</u></a>
                </div>
                <div class="col-lg-3 m-1 border border-secondary rounded text-center">
                    <img src="<?= $usSports->enclosure['url'] ?>" alt="<?= $olympics->enclosure['url'] ?>" class="imgSize my-2">
                    <p class="text-start"><b><?= $usSports->title ?></b></p>
                    <p class="text-start"><?= strftime($date_format, strtotime($usSports->pubDate)) ?></p>
                    <a href="<?php echo $usSports->link ?>" target="_blank" class="btn btn-success text-center mb-3"><u>Ouvrir l'article</u></a>
                </div>
            </div>
        </div>
    </div>
    

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>