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


<?php
for ($i = 1; $i < $A; $i++) { ?>
    <div class="rounded border border-secondary my-3 bg-light">
        <img src="<?= $flux[$i]->enclosure['url'] ?>" alt="<?= $flux[$i]->enclosure['url'] ?>" class="imgSize my-2">
        <p class="text-start px-1"><b><?= $flux[$i]->title ?></b></p>
        <p class="text-start px-1"><?= strftime($date_format, strtotime($flux[$i]->pubDate)) ?></p>
        <a href="<?= $flux[$i]->link ?>" target="_blank" class="btn btn-success text-center mb-3"><u>Ouvrir l'article</u></a>
    </div>
<?php } ?>