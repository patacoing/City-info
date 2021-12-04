  
<?php
require "vendor/autoload.php";
require "class/Regions.php";

$regions = new Regions("data/regions-france.csv");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="public/css.css">
    <script type="text/javascript" src="public/js.js"></script>
    <script src="https://kit.fontawesome.com/8b2d3fbf56.js" crossorigin="anonymous"></script>
</head>
<body onload="init()">
<div class="container">
    <div class="search">
        <form action="">
            <input type="text" placeholder="Recherche..." onkeydown="search(this)">
            <?php $regions->showSelect(); ?>
        </form>
    </div>
    <div class="slider">
        <div class="cadre">
            <div class="photo">
            <?php
                $i = 0;
                $regions = $regions->getData();
                foreach($regions as $region) {
                    if($i == 0) $region->showImg();
                    else $region->showImg(true);
                    $i++;
                }
                ?>
            </div>
            <div class="region">
                Guadeloupe
            </div>
        </div>
        <div class="buttons">
            <button id="previous" class="fas fa-backward fa-1x"></button>
            <button id="play" class="fa-light fa-chart-pyramid"></button>
            <button id="next" class="fas fa-forward fa-1x"></button>
        </div>
        <div class="submit">
            <form action="regionInfo.php" method="post" id="form-image">
                <input type="submit" name="action">
                <input type="hidden" name="region-name" value="<?= $regions[0]->getName(); ?>">
                <input type="hidden" name="region-path" value="<?= "http://localhost/City-info/data/img/".$regions[0]->getImgPath(); ?>">
            </form>
        </div>
    </div>
</div>
</body>
</html>

<!-- 
    il faut au moment de l'ajout d'un site : 
    ajouter aussi dans le json : le sélecteur css corespondant à la recherche
    aussi les attributs à extraire ??
-->
